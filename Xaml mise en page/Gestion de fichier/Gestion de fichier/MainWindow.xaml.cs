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
using System.Windows.Navigation;
using System.Windows.Shapes;

namespace Gestion_de_fichier
{
    /// <summary>
    /// Logique d'interaction pour MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        public MainWindow()
        {
            InitializeComponent();
            string path = @"../../../MonFichier.json";
            string[] tableau = new string[10] { "toto", "tata", "titi", "tutu", "tete", "lolo", "lala", "lili", "lulu", "lele" };
            string[] tableauRetour = new string[10];
            string json = tableau.JsonConvert();
            TextBlock.Text = json;
        }
    }
}
