using System;

namespace Traitements_conditionnels
{
    class Program
    {
        static void Main(string[] args)
        {
            //3.1
            //1
            //int age;
            //Console.WriteLine("Quel age a tu ?");
            //age = int.Parse(Console.ReadLine());
            //if (age<18)
            //{
            //    Console.WriteLine("Tu es mineur");
            //}
            //else
            //{
            //    Console.WriteLine("Tu es majeur");
            //}

            //2
            //int chiffre;
            //Console.WriteLine("entre un entier");
            //chiffre = int.Parse(Console.ReadLine());
            //Console.WriteLine("sa valeur absolue est " + Math.Abs(chiffre));

            //3
            //float note;
            //Console.WriteLine("Quelle est ta note ?");
            //note = float.Parse(Console.ReadLine());
            //if (note<8)
            //{
            //    Console.WriteLine("Ajourné !");
            //}
            //else if (note>10)
            //{
            //    Console.WriteLine("Admis !");
            //}
            //else
            //{
            //    Console.WriteLine("En rattrapage !");
            //}

            //4
            //double franchise;
            //double montantDommages;
            //Console.WriteLine("Quelle est le montant des dommages ?");
            //montantDommages = double.Parse(Console.ReadLine());
            //franchise = montantDommages * 0.1;
            //if (franchise > 4000)
            //{
            //    franchise = 4000;
            //}
            //Console.WriteLine("Le montant remboursé est de "+ (montantDommages- franchise)+". La franchise est de "+ franchise);
            //Console.ReadLine();

            //5
            //string saisie1;
            //string saisie2;
            //Console.WriteLine("1ere saisie :");
            //saisie1 = Console.ReadLine();
            //Console.WriteLine("2eme saisie :");
            //saisie2 = Console.ReadLine();
            //if (saisie1 == saisie2)
            //{
            //    Console.WriteLine("nombre de valeur distinctes 1");
            //}
            //else
            //{
            //    Console.WriteLine("nombre de valeur distinctes 2");
            //}

            //6
            //float petit1;
            //float petit2;
            //float petit3;
            //Console.WriteLine("1ere saisie :");
            //petit1 = float.Parse(Console.ReadLine());
            //Console.WriteLine("2eme saisie :");
            //petit2 = float.Parse(Console.ReadLine());
            //Console.WriteLine("3eme saisie :");
            //petit3 = float.Parse(Console.ReadLine());
            //if(petit1 < petit2 && petit1 < petit3)
            //{
            //    Console.WriteLine("le plus petit c'est " + petit1);
            //}
            //else if(petit2<petit3)
            //{
            //    Console.WriteLine("le plus petit c'est " + petit2);
            //}
            //else
            //{
            //    Console.WriteLine("le plus petit c'est " + petit3);
            //}

            //3.2
            //7
            //int a;
            //int b;
            //char op;
            //Console.WriteLine("1er entier :");
            //a = int.Parse(Console.ReadLine());
            //Console.WriteLine("2eme entier :");
            //b = int.Parse(Console.ReadLine());
            //Console.WriteLine("opérateur :");
            //op = char.Parse(Console.ReadLine());
            //Console.Write("le résultat est ");
            //switch (op)
            //{
            //    case '+':
            //        Console.WriteLine(a + b);
            //        break;
            //    case '-':
            //        Console.WriteLine(a - b);
            //        break;
            //    case '*':
            //        Console.WriteLine(a * b);
            //        break;
            //    case '/':
            //        Console.WriteLine((float)a / (float)b);
            //        break;
            //    default:
            //        Console.WriteLine("issue d'un opérateur inconnue");
            //        break;
            //}

            //3.3
            //8
            //int i;
            //int j;
            //Console.WriteLine("1ere coordonnée :");
            //i=int.Parse(Console.ReadLine());
            //Console.WriteLine("2eme coordonnée :");
            //j = int.Parse(Console.ReadLine());
            //if ((i+j)%2==0)
            //{
            //    Console.WriteLine("case noire");
            //}
            //else
            //{
            //    Console.WriteLine("case blanche");
            //}

            //9
            //int i;
            //int j;
            //int iprime;
            //int jprime;
            //Console.WriteLine("1ere coordonnée de départ :");
            //i = int.Parse(Console.ReadLine());
            //Console.WriteLine("2eme coordonnée de départ:");
            //j = int.Parse(Console.ReadLine());
            //Console.WriteLine("1ere coordonnée d'arrivé:");
            //iprime = int.Parse(Console.ReadLine());
            //Console.WriteLine("2eme coordonnée d'arrivé:");
            //jprime = int.Parse(Console.ReadLine());
            //Console.Write("Déplacement du cavalier de (" + i + "," + j + ") vers (" + iprime+","+ jprime+ ") ");
            //if ((Math.Abs(i-iprime)==1&& Math.Abs(j - jprime)==2)|| (Math.Abs(i - iprime) == 2 && Math.Abs(j - jprime) == 1))
            //{
            //    Console.WriteLine("correct.");
            //}
            //else
            //{
            //    Console.WriteLine("incorrect.");
            //}

            //10
            //int i;
            //int j;
            //int iprime;
            //int jprime;
            //int piece;
            //Console.WriteLine("1ere coordonnée de départ :");
            //i = int.Parse(Console.ReadLine());
            //Console.WriteLine("2eme coordonnée de départ:");
            //j = int.Parse(Console.ReadLine());
            //Console.WriteLine("1ere coordonnée d'arrivé:");
            //iprime = int.Parse(Console.ReadLine());
            //Console.WriteLine("2eme coordonnée d'arrivé:");
            //jprime = int.Parse(Console.ReadLine());
            //Console.WriteLine("Quelle pièce souhaitez-vous déplacer ?\n0 = cavalier\n1 = Tour\n2 = Fou\n3 = Dame\n4 = Roi");
            //piece = int.Parse(Console.ReadLine());
            //switch (piece)
            //{
            //    case 0:
            //        if ((Math.Abs(i - iprime) == 1 && Math.Abs(j - jprime) == 2) || (Math.Abs(i - iprime) == 2 && Math.Abs(j - jprime) == 1))
            //        {
            //            Console.WriteLine("Déplacement du cavalier de(" + i + ", " + j + ") vers(" + iprime+", "+ jprime+ ") correct.");
            //        }
            //        else
            //        {
            //            Console.WriteLine("Déplacement du cavalier de(" + i + ", " + j + ") vers(" + iprime + ", " + jprime + ") incorrect.");
            //        }
            //        break;
            //    case 1:
            //        if (i == iprime ^ j == jprime)
            //        {
            //            Console.WriteLine("Déplacement de la tour de(" + i + ", " + j + ") vers(" + iprime + ", " + jprime + ") correct.");
            //        }
            //        else
            //        {
            //            Console.WriteLine("Déplacement de la tour de(" + i + ", " + j + ") vers(" + iprime + ", " + jprime + ") incorrect.");
            //        }
            //        break;
            //    case 2:
            //        if (Math.Abs(i - iprime)== Math.Abs(j - jprime)&&i!=iprime)
            //        {
            //            Console.WriteLine("Déplacement du fou de(" + i + ", " + j + ") vers(" + iprime + ", " + jprime + ") correct.");
            //        }
            //        else
            //        {
            //            Console.WriteLine("Déplacement du fou de(" + i + ", " + j + ") vers(" + iprime + ", " + jprime + ") incorrect.");
            //        }
            //        break;
            //    case 3:
            //        if ((Math.Abs(i - iprime) == Math.Abs(j - jprime) && i != iprime) ||(i == iprime ^ j == jprime))
            //        {
            //            Console.WriteLine("Déplacement de la dame de(" + i + ", " + j + ") vers(" + iprime + ", " + jprime + ") correct.");
            //        }
            //        else
            //        {
            //            Console.WriteLine("Déplacement de la dame de(" + i + ", " + j + ") vers(" + iprime + ", " + jprime + ") incorrect.");
            //        }
            //        break;
            //    case 4:
            //        if (Math.Abs(i - iprime)==1|| Math.Abs(j - jprime)==1)
            //        {
            //            Console.WriteLine("Déplacement du roi de(" + i + ", " + j + ") vers(" + iprime + ", " + jprime + ") correct.");
            //        }
            //        else
            //        {
            //            Console.WriteLine("Déplacement du roi de(" + i + ", " + j + ") vers(" + iprime + ", " + jprime + ") incorrect.");
            //        }
            //        break;
            //}

            //3.4
            //11


        }
    }
}
