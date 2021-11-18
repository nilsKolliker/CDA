using Newtonsoft.Json;
using System;
using System.Collections.Generic;
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

namespace Gestion_de_produits
{
    /// <summary>
    /// Logique d'interaction pour ActionWindow.xaml
    /// </summary>
    public partial class ActionWindow : Window
    {
        public string Action { get; set; }
        public Produits Produits { get; set; }
        public MainWindow MainWindow { get; set; }

        public ActionWindow(string nomAction, Produits produit, MainWindow mainWindow)
        {
            InitializeComponent();
            MainWindow = mainWindow;
            Action = nomAction;
            action.Content = this.Action;
            if (this.Action!= "_Ajouter")
            {
                Produits = produit;
                Nom.Text = produit.Nom;
                Categ.Text = produit.Categorie;
                Rayon.Text = produit.Rayon;
                if (this.Action== "_Supprimer")
                {
                    Nom.IsEnabled = false;
                    Categ.IsEnabled = false;
                    Rayon.IsEnabled = false;
                }
            }
            
        }

        private void Valider(object sender, RoutedEventArgs e)
        {
            switch (Action)
            {
                case "_Ajouter":
                    Produits.Id = MainWindow.liste.Count;
                    MajProduit();
                    MainWindow.liste.Add(Produits)
                    break;
                case "_Modifier":
                    MajProduit();
                    break;
                case "_Supprimer":
                    break;
                default:
                    break;
            }
            this.Fermer();
        }
        private void Fermer(object sender, RoutedEventArgs e)
        {

            this.Fermer();
        }
        private void Fermer()
        {
            this.Close();
        }
        private void MajProduit()
        {
            Produits.Nom = Nom.Text;
            Produits.Categorie = Categ.Text;
            Produits.Rayon = Rayon.Text;
        }
    }
}
