using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Diagnostics;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Forms;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;

namespace GenerateurDeOuf
{
    /// <summary>
    /// Logique d'interaction pour Generateur.xaml
    /// </summary>
    public partial class Generateur : Window
    {
        public string conString { get; set; }
        public string infoConnexion { get; set; }

        public Generateur(string server, string username, string port, string pwd)
        {
            InitializeComponent();
            // on récupère les noms des bases de données
            infoConnexion = "\t\"Server\" : \""+server+ "\",\n\t\"Username\" : \"" + username+ "\",\n\t\"Password\" : \"" + pwd + "\",\n\t\"Port\" : \"" + port +"\"";
            ListeBDD(server, username, port, pwd);
        }

        private void openWindow(object sender, RoutedEventArgs e)
        {
            FolderBrowserDialog picker = new FolderBrowserDialog();
            DialogResult fenetre = picker.ShowDialog();
            if (fenetre == System.Windows.Forms.DialogResult.OK && dg.SelectedItem != null)//si l'utilisateur a bien choisi un dossier
            {
                Trace.WriteLine("ok");
            }
            string path = picker.SelectedPath;
            // on reporte le nom du dossier choisi par le parcourir dans la zone de texte
            affichePath.Text = path;
        }

        private void ListeBDD(string server, string username, string port, string pwd)
        {   // on recupere les bases de données disponibles
            this.conString = "Server="+server+ ";Database=information_schema;port=" + port + ";User Id=" + username + ";password=" + pwd + "";
            string sqlQuery = "SELECT schema_name as bdd FROM information_schema.schemata Where SCHEMA_NAME not in ('information_schema' ,'mysql','performance_schema','sys' )";
            MySqlConnection con = new MySqlConnection(this.conString);
            try
            {
                con.Open();
            }
            catch (Exception ex)
            {
                System.Windows.Forms.MessageBox.Show("Connexion à la base de données impossible. Vérifiez que les services de Wamp sont bien démarrés. \n\n" + ex.Message);
                Process.GetCurrentProcess().Kill();
            }
            
            MySqlCommand com = new MySqlCommand(sqlQuery, con);
            MySqlDataReader read = com.ExecuteReader();           
            List<bddname> tab = new List<bddname>();
            // on prépare un tableau pour remplir la datagrid
            while (read.Read())
            {
                // on crée un objet bddName pour pouvoir alimenter le datagrid
                tab.Add(new bddname(read.GetString("bdd")));
            }
            dg.ItemsSource = tab;
            dg.SelectedIndex = 0;
            dg.Focus();
        }

        private void generation(object sender, RoutedEventArgs e)
        {
            if (Directory.Exists(affichePath.Text) && this.nomProjet.Text!="")
            { 
                // on affiche la fenetre suivante, en lui passant toutes les informations
                Tables windowTable = new Tables(this.nomProjet.Text, affichePath.Text, ((bddname)dg.SelectedItem).Bdd, this.conString , this.infoConnexion);
                this.Visibility = Visibility.Hidden;
                windowTable.ShowDialog();
                this.Close();

            }
            else
            {
                System.Windows.Forms.MessageBox.Show("Chemin d'accès  ou nom de projet incorrect.");
            }
        }
    }
}
