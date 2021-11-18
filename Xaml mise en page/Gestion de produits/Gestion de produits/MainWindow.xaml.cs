using Newtonsoft.Json;
using System;
using System.Collections.Generic;
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
using System.Windows.Navigation;
using System.Windows.Shapes;

namespace Gestion_de_produits
{
    /// <summary>
    /// Logique d'interaction pour MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        public List<Produits> liste = new List<Produits>();
        public string Path { get; set; } = @"../../../MonFichier.json";
        public MainWindow()
        {

            InitializeComponent();
            //InitialiserJson();
            LireJson();
            GrilleProduit.ItemsSource = this.liste;
            

        }

        private void LireJson()
        {
            string json;
            try
            {
                json = File.ReadAllText(this.Path);
            }
            catch (Exception e)
            {
                return;
            }
            this.liste = JsonConvert.DeserializeObject<List<Produits>>(json);
        }

        private void InitialiserJson()
        {
            List<Produits> listeProduit = new List<Produits>();
            listeProduit.Add(new Produits(0, "gomme non létale", "papeterie", "Materiel de bureau"));
            listeProduit.Add(new Produits(1, "Tshirt bas de game", "Vetement", "Habillage homme"));
            File.WriteAllText(this.Path, JsonConvert.SerializeObject(listeProduit, Formatting.Indented));
        }

        private void Action(object sender, RoutedEventArgs e)
        {
            string action = (string)((Button)sender).Content;
            ActionWindow fenetre;
            
            if (action != "_Ajouter"&& GrilleProduit.SelectedItem==null)
            {
                return;
            }
            Produits produit = (Produits)GrilleProduit.SelectedItem;
            fenetre = new ActionWindow(action, produit, this);

            
            fenetre.ShowDialog();
        }
    }
}
