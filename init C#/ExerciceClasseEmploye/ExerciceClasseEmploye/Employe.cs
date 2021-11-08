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
        public static DateTime JourDePrime { get; set; } = DateTime.Parse("08/11");//comme ça, on a que là à le changer

        /// <summary>
        /// Construit un empoye
        /// </summary>
        /// <param name="nom"></param>
        /// <param name="prenom"></param>
        /// <param name="dateEmboche">au format dd/MM/yyyy</param>
        /// <param name="poste"></param>
        /// <param name="salaire"></param>
        /// <param name="service"></param>
        public Employe(string nom, string prenom, string dateEmboche, string poste, double salaire, string service)
        {
            Nom = nom;
            Prenom = prenom;
            DateEmboche = DateTime.Parse(dateEmboche);
            Poste = poste;
            Salaire = salaire;
            Service = service;
        }

        /// <summary>
        /// Calcul l'ancienneté d'un employer en année
        /// </summary>
        /// <returns>nombre d'année où il est dans la boite</returns>
        private int Anciennete()
        {
            DateTime auj = DateTime.Now;
            return (auj.Month > this.DateEmboche.Month||(auj.Month==this.DateEmboche.Month&& auj.Day >= this.DateEmboche.Day))?auj.Year-this.DateEmboche.Year:auj.Year - this.DateEmboche.Year -1;
        }
        
        /// <summary>
        /// calcule la prime annuel
        /// </summary>
        /// <returns>la valeur de la prime en k-euro</returns>
        private double CalculPrime()
        {
            return this.Salaire * (0.02 * this.Anciennete() + 0.05);
        }
        
        /// <summary>
        /// execute l'ordre de transfert le jour où la prime tombe
        /// temporise et demande d'attendre si c'est pas le bon jour
        /// </summary>
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
        
        /// <summary>
        /// retourne une chaine présentant l'employer
        /// </summary>
        /// <returns>une chaine présentant l'employer</returns>
        public override string ToString()
        {
            return "Nom: " + this.Nom + "\nPrenom: " + this.Prenom + "\nDate d'emboche: " + this.DateEmboche.ToString("dd/MM/yyyy") + "\nPoste: " + this.Poste + "\nSalaire: " + this.Salaire + "\nService: " + this.Service;
        }
        
        /// <summary>
        /// compare 2 employes selon l'ordre alphabétique de leur prenom
        /// </summary>
        /// <param name="employe1">un employer à comparer</param>
        /// <param name="employe2">un employer à comparer</param>
        /// <returns>-1 si employe1 est av employe2, 1 si employe1 est av employe2 et 0 sinon</returns>
        private static int ComparePrenom(Employe employe1, Employe employe2)
        {
            return String.CompareOrdinal(employe1.Prenom, employe2.Prenom);
        }
        
        /// <summary>
        /// compare 2 employes selon l'ordre alphabétique de leur nom puis de leur prenom
        /// </summary>
        /// <param name="employe1">un employer à comparer</param>
        /// <param name="employe2">un employer à comparer</param>
        /// <returns>-1 si employe1 est av employe2, 1 si employe1 est av employe2 et 0 sinon</returns>
        public static int CompareNomPrenom(Employe employe1, Employe employe2)
        {
            int resultCopare = String.CompareOrdinal(employe1.Nom, employe2.Nom);
            return (resultCopare == 0) ? ComparePrenom(employe1, employe2) : resultCopare;
        }
        
        /// <summary>
        /// compare 2 employes selon l'ordre alphabétique de leur service puis de leur nom puis de leur prenom
        /// </summary>
        /// <param name="employe1">un employer à comparer</param>
        /// <param name="employe2">un employer à comparer</param>
        /// <returns>-1 si employe1 est av employe2, 1 si employe1 est av employe2 et 0 sinon</returns>
        public static int CompareServiceNomPrenom(Employe employe1, Employe employe2)
        {
            int resultCopare = String.CompareOrdinal(employe1.Service, employe2.Service);
            return (resultCopare == 0) ? CompareNomPrenom(employe1, employe2) : resultCopare;
        }
    }
}
