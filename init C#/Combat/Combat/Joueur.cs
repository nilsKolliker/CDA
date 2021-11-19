using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Combat
{
    class Joueur
    {
        public int Pv { get; private set; }
        public int Score { get; set; }
        public int NombreDeVictime { get; set; }
        public De De { get; set; }
        public static bool Trace { get; set; }

        public Joueur()
        {
            this.Pv = 50;
            this.De = new De();
            this.Score = 0;
            this.NombreDeVictime = 0;
        }
        public bool EstVivant()
        {
            return this.Pv > 0;
        }
        public void Attaque(MonstreFacile monstre)
        {
            int monDe = this.De.LanceLeDe();
            int deMonstre = monstre.De.LanceLeDe();
            if (Trace) Console.WriteLine("MonHeros attaque: "+monDe+"  le Monstre : "+deMonstre);
            if (monDe >= deMonstre)
            {
                monstre.EstVivant = false;
                this.Score += monstre.DonneScore;
                this.NombreDeVictime++;
            }
        }
        private bool Bouclier()
        {
            int monDe = this.De.LanceLeDe();
            if (Trace) Console.WriteLine("***              bouclier "+monDe);
            return monDe <= 2;
        }
        public void SubitDegats (int degats)
        {
            if (this.Bouclier()) degats=0;
            this.Pv -= degats;
            if (Trace) 
            {
                Console.ForegroundColor = ConsoleColor.Red;
                Console.WriteLine("***              Héros subit des dégats "+degats+"   reste : "+this.Pv);
                Console.ForegroundColor = ConsoleColor.White;
            }
        }


    }
}
