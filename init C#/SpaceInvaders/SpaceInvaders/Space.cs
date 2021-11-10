using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace SpaceInvaders
{
    class Space
    {
        public int NbLigne { get; set; }
        public int NbColonnes { get; set; }
        public Invaders[,] Grille { get; set; }

        public Space(int nbLigne, int nbColonnes, Invaders invaders)
        {
            this.Grille = new Invaders[nbLigne, nbColonnes];
            this.NbLigne = nbLigne;
            this.NbColonnes = nbColonnes;
            for (int i = 0; i < nbColonnes; i++)
            {
                this.Grille[0, i] = invaders;
            }
        }
        public override string ToString()
        {
            string chaine = "┌";
            for (int i = 0; i < NbColonnes; i++)
            {
                chaine += "─";
            }
            chaine += "┐\n";
            for (int i = 0; i < this.NbLigne; i++)
            {
                chaine += "|";
                for (int j = 0; j < this.NbColonnes; j++)
                {
                    chaine += this.LeCharDeLaCase(i, j);
                }
                chaine += "|\n";
            }
            return chaine;
        }
        public string LaLigneDHorizon()
        {
            for (int i = 0; i < NbColonnes; i++)
            {
                chaine += "─";
            }
        }
        public string LeCharDeLaCase(int numLigne, int numColonnes)
        {
            if (this.Grille[numLigne, numColonnes] != null)
            {
                return this.Grille[numLigne, numColonnes].ToString();
            }
            else
            {
                return " ";
            }
        }
    }
}
