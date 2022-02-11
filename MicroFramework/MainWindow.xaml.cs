using Microsoft.AspNetCore.Http;
using System;
using System.Collections.Generic;
using System.Diagnostics;
using System.Linq;
using System.Reflection;
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
using System.Windows.Navigation;
using System.Windows.Shapes;
using MessageBox = System.Windows.Forms.MessageBox;

namespace GenerateurDeOuf
{
    /// <summary>
    /// Logique d'interaction pour MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        private MediaPlayer mediaPlayer;

        public MainWindow()
        {
            InitializeComponent();
            // Gestion de la musique lors d el'execution du generateur
            mediaPlayer = new MediaPlayer();
            //Install Recuperation des informations d'installation
            string path = Assembly.GetExecutingAssembly().Location;
            int position = path.IndexOf("GenerateurDeOuf.exe");
            Trace.WriteLine(path.Substring(0, position) + "pigloo-papa-pingouin-yourkidtv.mp3");
            // mediaPlayer.Open(new Uri(path.Substring(0, position) + "pigloo-papa-pingouin-yourkidtv.mp3"));
            // mediaPlayer.Position = new TimeSpan(0, 0, 6);
            // mediaPlayer.Play();
        }

        private void afficheBDD(object sender, RoutedEventArgs e)
        {
            // Affiche la fenetre suivante
            Generateur generateur = new Generateur(server.Text, username.Text, port.Text, password.Text);
            this.Visibility = Visibility.Hidden;
            generateur.ShowDialog();
            this.Close();
        }
    }
}

