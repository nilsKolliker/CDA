using System;

namespace LaClasseCompte
{
    class Program
    {
        static void Main(string[] args)
        {
            Client omar = new Client("EE111222", "Salim", "Omar", "0611111");
            Client samir = new Client("EE333444", "Karimi", "samir", "0622222");
            Compte compte1 = new Compte(omar);
            Compte compte2 = new Compte(samir);
            compte1.Afficher();
            Console.WriteLine("*****************************************************************************");
            compte1.Crediter(5000);
            compte1.Afficher();
            Console.WriteLine("*****************************************************************************");
            compte1.Debiter(1000);
            compte1.Afficher();
            Console.WriteLine("*****************************************************************************");
            compte2.Afficher();
            Console.WriteLine("*****************************************************************************");
            compte2.Crediter(3000, compte1);
            compte1.Debiter(1000, compte2);
            compte1.Afficher();
            Console.WriteLine("*****************************************************************************");
            compte2.Afficher();
            Console.WriteLine("*****************************************************************************");
            Compte.afficherNbrDeCompte();


        }
    }
}
