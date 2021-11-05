using System;

namespace LaClasseCompte
{
    class Program
    {
        static void Main(string[] args)
        {
            Client toto = new Client("123", "DUPONT", "Robert");
            Compte compteToto = new Compte(toto);
            Compte compteToto2 = new Compte(toto);
            Console.WriteLine(compteToto.Code);
            Console.WriteLine(compteToto2.Code);

        }
    }
}
