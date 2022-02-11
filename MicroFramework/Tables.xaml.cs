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
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;

namespace GenerateurDeOuf
{
    /// <summary>
    /// Logique d'interaction pour Tables.xaml
    /// </summary>
    public partial class Tables : Window
    {

        public string NomProjet { get; set; }
        public string Path { get; set; }
        public string NomBDD { get; set; }
        public string conString { get; set; }
        public string infoConnexion { get; set; }

        public Tables(string NomProjet, string Path, string NomBDD, string conString,string infoConnexion)
        {
            InitializeComponent();
            this.NomProjet = NomProjet;
            this.Path = Path;
            this.NomBDD = NomBDD;
            this.conString = conString;
            this.infoConnexion = infoConnexion;
            ListeTables();
        }

        private void ListeTables()
        { //on récupère la liste des tables de la base de données et on crée les tables Utilisateurs et textes, on remplie la table textes
            string sqlQuery = "USE "+ this.NomBDD + ";"
                             +"CREATE TABLE IF NOT EXISTS utilisateurs ("
                             +"idUtilisateur int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,"
                             +"nom varchar(50) NOT NULL,"
                             +"prenom varchar(50) NOT NULL,"
                             +"adresseMail varchar(50) UNIQUE NOT NULL,"
                             +"motDePasse varchar(50) NOT NULL,"
                             +"role int(11) NOT NULL COMMENT '2 Admin 1 User'"
                             +") ENGINE = InnoDB DEFAULT CHARSET = utf8;"

                             +"CREATE TABLE IF NOT EXISTS textes ("
                             +"idTexte int (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,"
                             +"codeTexte varchar (50) NOT NULL,"
                             +"fr LONGTEXT NOT NULL,"
                             +"en LONGTEXT NOT NULL"
                             +") ENGINE = InnoDB DEFAULT CHARSET = utf8;"

                             + "INSERT INTO `textes` (`idTexte`, `codeTexte`, `FR`, `EN`) VALUES (NULL, 'Bonjour', 'Bonjour', 'Hello') , " 
                             + "(NULL, 'Connexion', 'Connexion', 'Log in') ,"
                             + "(NULL, 'Deconnexion', 'Deconnexion', 'Log out') ,"
                             + "(NULL, 'Accueil', 'Accueil', 'Home') ,"
                             + "(NULL, 'AdresseEmail', 'Adresse email', 'Email address') ," 
                             + "(NULL, 'Mdp', 'Mot de passe', 'Password') ,"
                             + "(NULL, 'Inscription', 'Inscription', 'Registration') , "
                             + "(NULL, 'Nom', 'Nom', 'Surname'), "
                             + "(NULL, 'Prenom', 'Prenom', 'Name'), "
                             + "(NULL, 'InfoMdpLegend', 'Veuillez saisir au moins', 'Please enter at least'), "
                             + "(NULL, 'UneMajuscule', '1 majuscule', '1 uppercase'), "
                             + "(NULL, 'UneMinuscule', '1 minuscule', '1 lowercase'), "
                             + "(NULL, 'UnChiffre', '1 chiffre', '1 number'), "
                             + "(NULL, 'UnCaractereSpecial', '1 caractère spécial ( ! @ & # * ^ $ % +)', '1 special character ( ! @ & # * ^ $ % +)'), "
                             + "(NULL, 'MinimumCaractere', '8 caractères', '8 character'), "
                             + "(NULL, 'Confirmation', 'Confirmation', 'Confirmation'), "
                             + "(NULL, 'Reset', 'Réinitialisation', 'Reset'), "
                             + "(NULL, 'inputDefault', 'Choisir une valeur', 'Choose a value'), "
                             + "(NULL, 'Envoyer', 'Envoyer', 'Send'); "

                             + "SELECT DISTINCT TABLE_NAME as nomTable FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = \"" + this.NomBDD + "\"";
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
            List<Table> tab = new List<Table>();
            //on rempli le datasource
            while (read.Read())
            {
                // on utilise la classe table pour créer un tableau à 2 entrées : 1 pour la table actuelle, 1 pour mettre la saisie du nouveau format de nom de table
                tab.Add(new Table(read.GetString("nomTable")));
            }

            dg.ItemsSource = tab;
            dg.SelectedIndex = 0;
            dg.Focus();
        }

        private void generation(object sender, RoutedEventArgs e)
        {
            if (checkdg())
            {
                /***** Création du fichier *****/
                // on crée un fichier Json pur transférer les informations au programme php
                //Suppression du fichier si il existe
                if (File.Exists("./php/tables.json"))
                {
                    File.Delete("./php/tables.json");
                }
                //Creer le fichier
                string[] json = new string[1];
                string chaine = "{\n" +
                    "\t\"NomTables\" : \"";
                foreach (Table t in dg.ItemsSource)
                {
                    chaine += t.TableChange+";";
                }
                chaine=chaine.Substring(0,chaine.Length-1);
                chaine += "\",\n"
                     + this.infoConnexion
                     + "\n}";
                json[0] = chaine;

                File.WriteAllLines("./php/tables.json",json);

                //Lancement du programme
                string command = "/C php ./php/Main.php \"" + this.Path + "\" \"" + this.NomBDD + "\"  \"" + this.NomProjet+"\"";
                Trace.WriteLine(command);
                Process cmd = new Process();
                cmd.StartInfo.FileName = "cmd.exe";
                cmd.StartInfo.RedirectStandardInput = true;
                cmd.StartInfo.RedirectStandardOutput = true;
                cmd.StartInfo.CreateNoWindow = true;
                cmd.StartInfo.UseShellExecute = false;
                cmd.StartInfo.Arguments = command;
                cmd.Start();
                cmd.StandardInput.Flush();
                cmd.StandardInput.Close();
                cmd.WaitForExit();
                Console.WriteLine("retour console : ");
                string retour = cmd.StandardOutput.ReadToEnd();
                byte[] bytes = Encoding.Default.GetBytes(retour); 
                retour = Encoding.UTF8.GetString(bytes);
                Console.WriteLine(retour);
                MessageBox.Show(retour);
//                Process.Start("cmd.exe", command);
                this.Close();
            }
            else
            {
                System.Windows.Forms.MessageBox.Show("Le nom de la table et le nom de la table désiré doit être le même (non sensible à la casse)");
            }
        }

        // on vérifie que seul la casse a été modifié
        private bool checkdg()
        {
            List<Table> liste = (List<Table>)dg.ItemsSource;
            int cpt = 0;
            bool check = true;
            do
            {
                if (liste[cpt].TableName.ToLower() != liste[cpt].TableChange.ToLower())
                {
                    check = false;
                }
                cpt++;
            } while (cpt < liste.Count() && check==true);
            return check;
        }

        // à chaque changement, on vérifie que le nom reste le même
        private void dg_CurrentCellChanged(object sender, EventArgs e)
        {
            Table table = (Table)dg.SelectedItem;
            DataGridRow row = (DataGridRow)dg.ItemContainerGenerator.ContainerFromIndex(dg.SelectedIndex);
            if (table.TableChange.ToLower() != table.TableName.ToLower())
            {
                //System.Windows.Forms.MessageBox.Show("Le nom de la table et le nom de la table désiré doit être le même (non sensible à la casse)");
                row.Background = new SolidColorBrush(System.Windows.Media.Color.FromArgb(255, 255, 0, 0));
            }
            else
            {
                row.Background = new SolidColorBrush(System.Windows.Media.Color.FromArgb(255, 255, 255, 255));
            }
        }

    }
}
