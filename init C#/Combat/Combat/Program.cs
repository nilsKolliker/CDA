using System;

namespace Combat
{
    class Program
    {
        static void Main(string[] args)
        {
            Joueur joueur = new Joueur();
            Console.WriteLine("souhaitez vous une trace ? (O/N)");
            bool trace = Console.ReadLine() == "O";
            Joueur.Trace = trace;
            MonstreFacile.Trace = trace;
            do
            {
                MonstreFacile monstre = CreaMonstre();
                MatchAMort(joueur, monstre);
            } while (joueur.EstVivant());
            Console.WriteLine("Dommage, vous êtes mort...\nCela dit, vous avez tué "+(2 * joueur.NombreDeVictime - joueur.Score) + " monstres faciles et "+ (joueur.Score - joueur.NombreDeVictime) + " monstres difficiles .\nVous avez "+joueur.Score+" points");

            void MatchAMort(Joueur joueur, MonstreFacile monstre)
            {
                do
                {
                    joueur.Attaque(monstre);
                    if (!monstre.EstVivant)
                    {
                        if (trace)
                        {
                            Console.ForegroundColor = ConsoleColor.Green;
                            Console.WriteLine("***              Héro gagne");
                            Console.ForegroundColor = ConsoleColor.White;
                            Console.WriteLine("*********************************** Monstre Suivant");
                        }
                        return; 
                    }
                    monstre.Attaque(joueur);
                } while (joueur.EstVivant());
            }

            MonstreFacile CreaMonstre()
            {
                if (new De().LanceLeDe()<4)
                {
                    return new MonstreFacile();
                }
                else
                {
                    return new MonstreDifficile();
                }
            }            
        }
    }
}
