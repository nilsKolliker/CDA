using System;

namespace _1._4
{
    class Program
    {
        static void Main(string[] args)
        {
            char a = 'a';
            Console.WriteLine("'"+a+"' a pour code: "+ (int) a );

            char caract;
            string saisie;
            Console.WriteLine("minuscule :");
            saisie = Console.ReadLine();
            caract = Convert.ToChar(saisie.Substring(0,1));
            Console.WriteLine("MAJUSCULE !");
            Console.WriteLine(Char.ToUpper(caract));
            Console.ReadLine();
        }
    }
}
