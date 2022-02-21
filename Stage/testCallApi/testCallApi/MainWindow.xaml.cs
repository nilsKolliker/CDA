using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Net.Http;
using System.Net.Http.Headers;
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

namespace testCallApi
{
    /// <summary>
    /// Logique d'interaction pour MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        private static HttpClient Client { get; set; }
        public string ApiUrl { get; set; }
        public MainWindow()
        {
            InitializeComponent();
            //ApiUrl = "http://nk/Nils-KOLLIKER/Nils%20Kolliker/Lab/API/Parkings%20Armentieres/opendata.lillemetropole.fr.json";
            ApiUrl = "http://nk/testApi.php";
            Client = new HttpClient();

        }
        public async Task<string> CallApi()
        {
            string donnee = "";
            //var retour = await Client.GetAsync(ApiUrl).ConfigureAwait(false);
            object objet = new
            {
                toto="titi",
                tata="tutu"
            };
            StringContent laPost = new StringContent(JsonConvert.SerializeObject(objet), Encoding.UTF8);
            laPost.Headers.ContentType=new MediaTypeHeaderValue("application/json");
            var retour = await Client.PostAsync(ApiUrl,laPost).ConfigureAwait(false);
            if (retour.IsSuccessStatusCode)
            {
                donnee = await retour.Content.ReadAsStringAsync().ConfigureAwait(false);
                //donnee = "ok";
            }
            return donnee;
        }

        private void reset_Click(object sender, RoutedEventArgs e)
        {
            Text.Text = "";
        }

        private void button_Click(object sender, RoutedEventArgs e)
        {
            Text.Text = CallApi().GetAwaiter().GetResult();
        }
    }

}
