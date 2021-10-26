using System;

namespace _1._1._1
{
    class Program
    {
        static void Main(string[] args)
        {
            string nom;

            Console.WriteLine("Qui t'es ?");
            nom = Console.ReadLine();
            Console.WriteLine("Tu es " + nom + " !");

            //1.1.2
            bool cEstEntier;
            int entier;
            entier = 0;
            do
            {
                try
                {
                    Console.WriteLine("Donne un entier");
                    nom = Console.ReadLine();
                    entier = Convert.ToInt32(nom);
                    cEstEntier = true;
                }
                catch
                {
                    cEstEntier = false;
                }
            }
            while (!cEstEntier);
            Console.WriteLine("ton entier est");
            Console.WriteLine(entier);
            Console.ReadLine();
        }
    }
}
