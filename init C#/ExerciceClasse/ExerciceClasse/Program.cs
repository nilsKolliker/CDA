using System;

namespace ExerciceClasse
{
    class Program
    {
        static void Main(string[] args)
        {
            Voiture titine = new Voiture("Citroëne", "C4");
            titine.NbKm = 10000;
            Voiture tuture = new Voiture("Renault", "Kadjar");
            tuture.Couleur = "rouge";
            Console.WriteLine(titine);
            Console.WriteLine(tuture);
            titine.Rouler(53);
            Console.WriteLine(titine);
        }
    }
}
