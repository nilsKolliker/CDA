using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading;
using System.Threading.Tasks;

namespace SpaceInvaders
{
    class Space
    {
        public int NbLigne { get; set; }
        public int NbColonnes { get; set; }
        public Invaders[,] Grille { get; set; }
        public int Score { get; private set; } = 0;

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
            string chaine = "┌"+this.LaLigneDHorizontal()+"┐\n";
            for (int i = 0; i < this.NbLigne; i++)
            {
                chaine += "|";
                for (int j = 0; j < this.NbColonnes; j++)
                {
                    chaine += this.LeCharDeLaCase(i, j);
                }
                chaine += "|\n";
            }
            return chaine+ "└"+ this.LaLigneDHorizontal()+ "┘\n\nScore: "+this.Score;
        }
        public string LaLigneDHorizontal()
        {
            string chaine = "";
            for (int i = 0; i < NbColonnes; i++)
            {
                chaine += "─";
            }
            return chaine;
        }
        public string LeCharDeLaCase(int numLigne, int numColonne)
        {
            if (this.Grille[numLigne, numColonne] != null)
            {
                return this.Grille[numLigne, numColonne].ToString();
            }
            else
            {
                return " ";
            }
        }
        public void Tirer(int numColonne)
        {
            int numLigne = this.NbLigne - 1;
            bool Collision = false;
            Invaders tire = new Invaders('Î');//normalement le tire serait un objet à part mais.. là, la grille ne prend que des invaders et on a pas vu l'heritage
            Grille[numLigne, numColonne] = tire;
            this.AfficherVite();
            while (numLigne > 0 && !Collision)
            {
                if (this.Grille[numLigne-1, numColonne]!=null)
                {
                    Collision = true;
                    this.Score++;
                }
                this.Grille[numLigne, numColonne] = null;
                this.Grille[numLigne - 1, numColonne] = tire;
                numLigne--;
                this.AfficherVite();
            }
            Grille[numLigne, numColonne] = null;
            this.AfficherVite();

        }

        public void AfficherVite()
        {
            Console.Clear();
            Console.WriteLine(this);
            Thread.Sleep(200);
        }
    }
}
