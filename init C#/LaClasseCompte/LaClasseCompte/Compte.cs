using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace LaClasseCompte
{
    class Compte
    {
        public double Solde { get; }
        public int Code { get; }
        public static int Compteur { get; set; } = 0;
        public Client Proprietaire { get; set; }

        public Compte(Client proprietaire)
        {
            Code = Compteur++;
            Proprietaire = proprietaire;
        }
    }
}
