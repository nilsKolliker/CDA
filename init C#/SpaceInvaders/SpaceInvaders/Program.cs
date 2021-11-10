using System;

namespace SpaceInvaders
{
    class Program
    {
        static void Main(string[] args)
        {
            Invaders mechantEnvahisseur = new Invaders('x');
            Space niveau1 = new Space(7, 5, mechantEnvahisseur);
            niveau1.Grille[1, 2] = mechantEnvahisseur;
            niveau1.Tirer(2);
            niveau1.Tirer(4);
            niveau1.Tirer(4);
        }
    }
}
