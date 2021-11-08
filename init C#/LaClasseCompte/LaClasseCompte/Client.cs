using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace LaClasseCompte
{
    class Client
    {
        public string CIN { get; set; }
        public string Nom { get; set; }
        public string Prenom { get; set; }
        public string Tel { get; set; }

        public Client(string CIN, string nom, string prenom, string tel)
        {
            this.CIN = CIN;
            this.Nom = nom;
            this.Prenom = prenom;
            this.Tel = tel;
        }

        public Client(string CIN, string nom, string prenom)
        {
            this.CIN = CIN;
            this.Nom = nom;
            this.Prenom = prenom;
        }

        public override string ToString()
        {
            return "CIN: " + this.CIN + "| Nom: " + this.Nom + "| Prenom: " + this.Prenom + "| Tél: " + this.Tel;
        }
        public void Afficher()
        {
            Console.WriteLine(this);
        }
    }
}
