using System;

namespace _1._2
{
    class Program
    {
        static void Main(string[] args)
        {
            bool cEstEntier;
            string saisie;
            int entier1;
            entier1 = 0;
            int entier2;
            entier2 = 1;
            int quotient;
            quotient = 0;
            do
            {
                try
                {
                    Console.WriteLine("Donne un 1er entier");
                    saisie = Console.ReadLine();
                    entier1 = Convert.ToInt32(saisie);
                    cEstEntier = true;
                }
                catch
                {
                    cEstEntier = false;
                }
            }
            while (!cEstEntier);
            do
            {
                try
                {
                    Console.WriteLine("Donne un 2eme entier (mais pas 0)");
                    saisie = Console.ReadLine();
                    entier2 = Convert.ToInt32(saisie);
                    quotient = entier1 / entier2;
                    cEstEntier = true;
                }
                catch
                {
                    cEstEntier = false;
                }
            }
            while (!cEstEntier);
            Console.WriteLine("somme :"+(entier1+entier2)+" quotient :"+quotient);
            Console.ReadLine();
        }
    }
}
