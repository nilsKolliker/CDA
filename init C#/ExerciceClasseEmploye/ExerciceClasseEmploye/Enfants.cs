using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ExerciceClasseEmploye
{
    class Enfants
    {
        public string Prenom { get; set; }
        public DateTime DateDeNaissance { get; set; }
        /// <summary>
        /// 
        /// </summary>
        /// <param name="prenom"></param>
        /// <param name="dateDeNaissance">format dd/MM/yyyy</param>
        public Enfants(string prenom, string dateDeNaissance)
        {
            Prenom = prenom;
            DateDeNaissance = DateTime.Parse(dateDeNaissance);
        }
        public override string ToString()
        {
            return "Age: "+this.Age()+" Prenom: " + this.Prenom + "  Date de naissance: "+ this.DateDeNaissance.ToString("dd/MM/yyyy");
        }
        /// <summary>
        /// Calcule l'age de l'enfant
        /// </summary>
        /// <returns>l'age</returns>
        private int Age()
        {
            DateTime auj = DateTime.Now;
            return (auj.Month > this.DateDeNaissance.Month || (auj.Month == this.DateDeNaissance.Month && auj.Day >= this.DateDeNaissance.Day)) ? auj.Year - this.DateDeNaissance.Year : auj.Year - this.DateDeNaissance.Year - 1;
        }
        /// <summary>
        /// Calcul le montant du chèque Noël en fonction de l'age du gamin
        /// 20 euros pour les enfants de 0 à 10 ans
        /// 30 euros pour les enfants de 11 à 15 ans
        /// 50 euros pour les enfants de 16 à 18 ans
        /// 0 euros pour les autres
        /// </summary>
        /// <returns>Le montant du chèque Noël</returns>
        public int MontantDuCheque()
        {
            int age = this.Age();
            if (age<11)
            {
                return (int)Ressources.ChequeNoel.Cheque_Enfant;
            }
            else if (age < 16)
            {
                return (int)Ressources.ChequeNoel.Cheque_PreAdo;
            }
            else if (age <19)
            {
                return (int)Ressources.ChequeNoel.Cheque_Ado;
            }
            else
            {
                return (int)(int)Ressources.ChequeNoel.Cheque_Adulte;
            }
        }
    }
}
