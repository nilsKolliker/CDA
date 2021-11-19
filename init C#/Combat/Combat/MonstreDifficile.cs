using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Combat
{
    class MonstreDifficile : MonstreFacile
    {
        public MonstreDifficile():base()
        {
            base.DonneScore = 2;
        }

        public override void Attaque(Joueur joueur)
        {
            if (Trace)
            {
                Console.ForegroundColor = ConsoleColor.Yellow;
                Console.WriteLine("C'est un Monstre Difficile");
                Console.ForegroundColor = ConsoleColor.White;
            }
            base.Attaque(joueur);
            this.SortMagique(joueur);
        }

        public void SortMagique(Joueur joueur)
        {
            int niveauMagie = base.De.LanceLeDe();
            if (Trace) Console.WriteLine("***              sort magique " + niveauMagie);
            joueur.SubitDegats((niveauMagie % 6) * 5);
        }
    }
}
