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

namespace testCalculette
{
    /// <summary>
    /// Logique d'interaction pour MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        private double ResultatDAvant { get; set; } = 0;
        private bool OperateurJusteAvant { get; set; } = false;
        private bool SaisiePositive { get; set; } = true;
        public string MessageDErreur { get; } = "ERREUR";
        public MainWindow()
        {
            InitializeComponent();
        }

        /// <summary>
        /// change la police en fonction de la taille de la fenetre
        /// </summary>
        /// <param name="sender"></param>
        /// <param name="e"></param>
        private void Window_SizeChanged(object sender, SizeChangedEventArgs e)
        {
            double height = Application.Current.MainWindow.Height;
            double width = Application.Current.MainWindow.Width;
            if (height > width)
            {
                Resources["Police"] = width / 35;
            }
            else
            {
                Resources["Police"] = height / 35;
            }
        }

        /// <summary>
        /// comportement des touches numerique classique:
        /// complete la saisie numerique
        /// nouvelle saisie apres une touche d'opération.
        /// </summary>
        /// <param name="sender"></param>
        /// <param name="e"></param>
        private void btnNumber_Click(object sender, RoutedEventArgs e)
        {
            string chiffreTaper = "" + ((Button)sender).Content;
            if (this.OperateurJusteAvant)
            {
                double resultatDAvant = 0;
                double.TryParse(txbResultat.Text,out resultatDAvant);
                this.ResultatDAvant = resultatDAvant;
                this.OperateurJusteAvant = false;
                if (!this.SaisiePositive)
                {
                    chiffreTaper = "-" + chiffreTaper;
                    this.SaisiePositive = true;
                }
                txbResultat.Text = chiffreTaper;
            }
            else
            {
                txbResultat.Text += chiffreTaper;

            }

        }

        /// <summary>
        /// permet de rajouter une virgule
        /// </summary>
        /// <param name="sender"></param>
        /// <param name="e"></param>
        private void btnAVirgule_Click(object sender, RoutedEventArgs e)
        {
            if (txbResultat.Text.IndexOf(",") == -1&& !OperateurJusteAvant && txbResultat.Text!="")
            {
                btnNumber_Click(sender, e);
            }
        }

        /// <summary>
        /// comportement des boutons d'opération non unaire
        /// dont le changement positif negatif
        /// </summary>
        /// <param name="sender"></param>
        /// <param name="e"></param>
        private void btnOperation_Click(object sender, RoutedEventArgs e)
        {
            if (!this.OperateurJusteAvant)
            {
                Calculer();
                this.OperateurJusteAvant = true;
                txbOperateur.Text = (string)((Button)sender).Content;
            }
            else 
            {
                switch ((string)((Button)sender).Content)
                {
                    case "+":
                        this.SaisiePositive = true;
                        break;
                    case "-":
                        this.SaisiePositive = false;
                        break;
                    default:
                        txbOperateur.Text = (string)((Button)sender).Content;
                        break;
                }
            }
        }
        /// <summary>
        /// comportement des boutons d'operation unaire (dont le =)
        /// </summary>
        /// <param name="sender"></param>
        /// <param name="e"></param>
        private void btnOperationUnaire_Click(object sender, RoutedEventArgs e)
        {
            if(!OperateurJusteAvant) Calculer();
            txbOperateur.Text = (string)((Button)sender).Content;
            this.OperateurJusteAvant = true;
            if (txbResultat.Text!=this.MessageDErreur)
            {
                switch ((string)((Button)sender).Content)
                {
                    case "%":
                        txbResultat.Text = "" + (double.Parse(txbResultat.Text) / 100);
                        break;
                    case "√":
                        if (double.Parse(txbResultat.Text) < 0)
                        {
                            txbResultat.Text = this.MessageDErreur;
                        }
                        else
                        {
                            txbResultat.Text = "" + Math.Sqrt( double.Parse(txbResultat.Text));
                        }
                        break;
                    case "+/-":
                        txbResultat.Text = "" + (double.Parse(txbResultat.Text) *-1);
                        break;
                    default:
                        break;
                }
            }
        }
        /// <summary>
        /// effectue le calcule non unaire en cours à partire de l'operateur, du résultat stocké et du nombre saisie
        /// </summary>
        private void Calculer()
        {
            switch (txbOperateur.Text)
            {
                case "+":
                    txbResultat.Text = "" + (this.ResultatDAvant + double.Parse(txbResultat.Text));
                    break;
                case "-":
                    txbResultat.Text = "" + (this.ResultatDAvant - double.Parse(txbResultat.Text));
                    break;
                case "x":
                    txbResultat.Text = "" + (this.ResultatDAvant * double.Parse(txbResultat.Text));
                    break;
                case "÷":
                    if (double.Parse(txbResultat.Text) == 0)
                    {
                        txbResultat.Text = this.MessageDErreur;
                    }
                    else
                    {
                        txbResultat.Text = "" + (this.ResultatDAvant / double.Parse(txbResultat.Text));
                    }
                    break;
                default:
                    break;
            }
        }
    }
}
