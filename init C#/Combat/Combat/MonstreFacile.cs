using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Combat
{
    class MonstreFacile
    {
        public int DonneScore { get; set; }
        public bool EstVivant { get; set; }
        public De De { get; set; }
        public static bool Trace { get; set; }

        public MonstreFacile()
        {
            this.EstVivant = true;
            this.De = new De();
            this.DonneScore = 1;
        }
        public virtual void Attaque(Joueur joueur)
        {
            int monDe = this.De.LanceLeDe();
            int deJoueur = joueur.De.LanceLeDe();
            if (Trace) Console.WriteLine("Monstre  attaque: " + monDe + "  mon héros : " + deJoueur);
            if (monDe > deJoueur)
            {
                joueur.SubitDegats(10);
            }
        }
    }
}
