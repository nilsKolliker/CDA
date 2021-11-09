using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ExerciceClasseEmploye
{
    class Employes
    {
        public string Nom { get; set; }
        public string Prenom { get; set; }
        public DateTime DateEmboche { get; }
        public string Poste { get; set; }
        public double Salaire { get; set; }
        public string Service { get; set; }
        public Agences Agence { get; set; }
        public List<Enfants> ListeEnfants { get; set; } = new List<Enfants>();
        public static DateTime JourDePrime { get; set; } = DateTime.Parse("08/11");//comme ça, on a que là à le changer
        
        /// <summary>
        /// 
        /// </summary>
        /// <param name="nom"></param>
        /// <param name="prenom"></param>
        /// <param name="dateEmboche">format dd/MM/yyyy</param>
        /// <param name="poste"></param>
        /// <param name="salaire"></param>
        /// <param name="service"></param>
        /// <param name="agence"></param>
        /// <param name="listeEnfants"></param>
        public Employes(string nom, string prenom, string dateEmboche, string poste, double salaire, string service, Agences agence, List<Enfants> listeEnfants)
        {
            Nom = nom;
            Prenom = prenom;
            DateEmboche = DateTime.Parse(dateEmboche);
            Poste = poste;
            Salaire = salaire;
            Service = service;
            Agence = agence;
            ListeEnfants = listeEnfants;
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
        public double CalculPrime()
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
            string toString = "Nom: " + this.Nom + "\nPrenom: " + this.Prenom + "\nDate d'emboche: " + this.DateEmboche.ToString("dd/MM/yyyy") + "\nPoste: " + this.Poste + "\nSalaire: " + this.Salaire + "\nService: " + this.Service + "\nChèques vacances: " + (this.EligibiliteChequeVacance() ? "Oui" : "Non") + "\nChèques Noël: ";
            if (this.EligibiliteChequeNoel())
            {
                toString += "Oui";
                foreach (int montantDuCheque in Enum.GetValues(typeof(Ressources.ChequeNoel)))
                {
                    if (montantDuCheque>0&& this.NombreDeChequeNoel(montantDuCheque) > 0)
                    {
                        toString += "\n\t" + this.NombreDeChequeNoel(montantDuCheque) + " chèque(s) de " + montantDuCheque + " euro";
                    }
                }
            } else 
            {
                toString += "Non";                  
            }
            toString += "\nAgence: " + this.Agence.Nom;
            foreach (Enfants enfant in this.ListeEnfants)
            {
                toString += "\nEnfant: " + enfant;
            }
            return toString;

        }
        
        /// <summary>
        /// compare 2 employes selon l'ordre alphabétique de leur prenom
        /// </summary>
        /// <param name="employe1">un employer à comparer</param>
        /// <param name="employe2">un employer à comparer</param>
        /// <returns>-1 si employe1 est av employe2, 1 si employe1 est av employe2 et 0 sinon</returns>
        private static int ComparePrenom(Employes employe1, Employes employe2)
        {
            return String.CompareOrdinal(employe1.Prenom, employe2.Prenom);
        }
        
        /// <summary>
        /// compare 2 employes selon l'ordre alphabétique de leur nom puis de leur prenom
        /// </summary>
        /// <param name="employe1">un employer à comparer</param>
        /// <param name="employe2">un employer à comparer</param>
        /// <returns>-1 si employe1 est av employe2, 1 si employe1 est av employe2 et 0 sinon</returns>
        public static int CompareNomPrenom(Employes employe1, Employes employe2)
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
        public static int CompareServiceNomPrenom(Employes employe1, Employes employe2)
        {
            int resultCopare = String.CompareOrdinal(employe1.Service, employe2.Service);
            return (resultCopare == 0) ? CompareNomPrenom(employe1, employe2) : resultCopare;
        }

        /// <summary>
        /// permet de savoir si l'employé peut disposer  de  chèques vacances ou non.
        /// </summary>
        /// <returns>true si il peut en disposer</returns>
        public bool EligibiliteChequeVacance()
        {
            return Anciennete() > 0;
        }

        /// <summary>
        /// permet de savoir si l'employé peut disposer  de  chèques noël ou non.
        /// </summary>
        /// <returns>true si il peut en disposer</returns>
        public bool EligibiliteChequeNoel()
        {
            int totalNoel = 0;
            foreach (Enfants enfant in this.ListeEnfants)
            {
                totalNoel += enfant.MontantDuCheque();
            }
            return totalNoel > 0;
        }

        /// <summary>
        /// compte le nombre de cheque noel d'un montant fixe
        /// </summary>
        /// <param name="montantDuCheque">le montant en euro du cheque dont on veut connaitre le nombre</param>
        /// <returns></returns>
        public int NombreDeChequeNoel(int montantDuCheque)
        {
            int nombreDeChequeNoel = 0;
            foreach (Enfants enfant in this.ListeEnfants)
            {
                if (enfant.MontantDuCheque() == montantDuCheque) nombreDeChequeNoel++;
            }
            return nombreDeChequeNoel;
        }
    }
}
