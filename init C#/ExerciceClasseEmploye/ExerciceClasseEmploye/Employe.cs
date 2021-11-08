using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ExerciceClasseEmploye
{
    class Employe
    {
        public string Nom { get; set; }
        public string Prenom { get; set; }
        public DateTime DateEmboche { get; }
        public string Poste { get; set; }
        public double Salaire { get; set; }
        public string Service { get; set; }
        public static DateTime JourDePrime { get; set; } = DateTime.Parse("08/11");
        public Employe(string nom, string prenom, string dateEmboche, string poste, double salaire, string service)
        {
            Nom = nom;
            Prenom = prenom;
            DateEmboche = DateTime.Parse(dateEmboche);
            Poste = poste;
            Salaire = salaire;
            Service = service;
        }
        private int Anciennete()
        {
            DateTime auj = DateTime.Now;
            return (auj.Month > this.DateEmboche.Month||(auj.Month==this.DateEmboche.Month&& auj.Day >= this.DateEmboche.Day))?auj.Year-this.DateEmboche.Year:auj.Year - this.DateEmboche.Year -1;
        }
        private double CalculPrime()
        {
            return this.Salaire * (0.02 * this.Anciennete() + 0.05);
        }
        public void DonnerLaPrime()
        {
            if (DateTime.Now.ToString("dd/MM")==JourDePrime.ToString("dd/MM"))
            {
                Console.WriteLine(" l’ordre de transfert a été envoyé à la banque\nMontant: "+Math.Round(this.CalculPrime(),5)+ " k-Euro");
            }
            else
            {
                Console.WriteLine("Nous ne sommes pas encore le " + JourDePrime.ToString("dd/MM") + ". Veillez patienter...");
            }
        }
        public override string ToString()
        {
            return "Nom: "+this.Nom+"\nPrenom: "+this.Prenom
        }
    }
}
