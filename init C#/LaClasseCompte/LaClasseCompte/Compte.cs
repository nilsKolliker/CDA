using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace LaClasseCompte
{
    class Compte
    {
        public double Solde { get; private set; }
        public int Code { get; private set; }
        private static int nbrDeCompte { get; set; } = 0;
        public Client Proprietaire { get; set; }

        public Compte(Client proprietaire)
        {
            Code = ++nbrDeCompte;
            this.Proprietaire = proprietaire;
        }

        public void Crediter(double somme)
        {
            this.Solde += somme;
        }
        public void Crediter(double somme, Compte compte)
        {
            this.Crediter(somme);
            compte.Debiter(somme);
        }
        public void Debiter(double somme)
        {
            this.Solde -= somme;
        }
        public void Debiter(double somme, Compte compte)
        {
            this.Debiter(somme);
            compte.Crediter(somme);
        }
        public override string ToString()
        {
            return this.Proprietaire + "| Code: " + this.Code + "| Solde: " + this.Solde;
        }
        public void Afficher()
        {
            Console.WriteLine(this);
        }
        public static void afficherNbrDeCompte()
        {
            Console.WriteLine("nombre de compte crées: " + nbrDeCompte);
        }
    }
}
