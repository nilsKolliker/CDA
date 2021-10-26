using System;

namespace _1._3
{
    class Program
    {
        static void Main(string[] args)
        {
            bool caFlotte;
            string saisie;
            double reel1;
            reel1 = 0;
            double reel2;
            reel2 = 0;
            double reel3;
            reel3 = 0;
            do
            {
                try
                {
                    Console.WriteLine("Donne un 1 réel");
                    saisie = Console.ReadLine();
                    reel1 = Convert.ToDouble(saisie);
                    caFlotte = true;
                }
                catch
                {
                    caFlotte = false;
                }
            } while (!caFlotte);
            Console.WriteLine("Le réel est : "+reel1);
            do
            {
                try
                {
                    Console.WriteLine("Donne un 2eme réel");
                    saisie = Console.ReadLine();
                    reel2 = Convert.ToDouble(saisie);
                    caFlotte = true;
                }
                catch
                {
                    caFlotte = false;
                }
            } while (!caFlotte);
            do
            {
                try
                {
                    Console.WriteLine("Donne un 3 réel");
                    saisie = Console.ReadLine();
                    reel3 = Convert.ToDouble(saisie);
                    caFlotte = true;
                }
                catch
                {
                    caFlotte = false;
                }
            } while (!caFlotte);
            Console.WriteLine("la moyenne des 3 est : "+((reel1+reel2+reel3)/3.0));
            Console.WriteLine("l'aire (surface) d'un rectangle de longueur " + reel1 + " et de largeur " + reel2 + " est de " + (reel1 * reel2));



            Console.ReadLine();
        }
    }
}
