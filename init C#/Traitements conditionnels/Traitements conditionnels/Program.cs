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
            //if (petit1 < petit2 && petit1 < petit3)
            //{
            //    Console.WriteLine("le plus petit c'est " + petit1);
            //}
            //else if (petit2 < petit3)
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
            //        if (b != 0)
            //        {
            //            Console.WriteLine((float)a / (float)b);
            //        }
            //        else
            //        {
            //            Console.WriteLine("impossible");
            //        }
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
            //string stringPiece;
            //string etat;
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
            //        stringPiece = "du cavalier";
            //        if ((Math.Abs(i - iprime) == 1 && Math.Abs(j - jprime) == 2) || (Math.Abs(i - iprime) == 2 && Math.Abs(j - jprime) == 1))
            //        {
            //            etat = "correct";
            //        }
            //        else
            //        {
            //            etat = "incorrect";
            //        }
            //        break;
            //    case 1:
            //        stringPiece = "de la tour";
            //        if (i == iprime || j == jprime)
            //        {
            //            etat = "correct";
            //        }
            //        else
            //        {
            //            etat = "incorrect";
            //        }
            //        break;
            //    case 2:
            //        stringPiece = "du fou";
            //        if (Math.Abs(i - iprime) == Math.Abs(j - jprime))
            //        {
            //            etat = "correct";
            //        }
            //        else
            //        {
            //            etat = "incorrect";
            //        }
            //        break;
            //    case 3:
            //        stringPiece = "de la dame";
            //        if (Math.Abs(i - iprime) == Math.Abs(j - jprime) || (i == iprime ||j == jprime))
            //        {
            //            etat = "correct";
            //        }
            //        else
            //        {
            //            etat = "incorrect";
            //        }
            //        break;
            //    case 4:
            //        stringPiece = "du roi";
            //        if (Math.Abs(i - iprime) < 2 && Math.Abs(j - jprime) < 2)
            //        {
            //            etat = "correct";
            //        }
            //        else
            //        {
            //            etat = "incorrect";
            //        }
            //        break;
            //    default:
            //        stringPiece = "d'une piece inconnue";
            //        etat = "incorrect";
            //        break;

            //}
            //Console.WriteLine("Déplacement "+ stringPiece + " de (" + i + ", " + j + ") vers (" + iprime + ", " + jprime + ") "+etat);

            //3.4
            //11

            int heureDebut;
            int minuteDebut;
            int heureFin;
            int minuteFin;
            int heureDEcart;
            int minuteDEcart;
            Console.WriteLine("heure de début :");
            heureDebut = int.Parse(Console.ReadLine());
            Console.WriteLine("minutes de début :");
            minuteDebut = int.Parse(Console.ReadLine());
            Console.WriteLine("heure de fin :");
            heureFin = int.Parse(Console.ReadLine());
            Console.WriteLine("minutes de fin :");
            minuteFin = int.Parse(Console.ReadLine());
            if (minuteDebut > minuteFin)
            {
                minuteDEcart = 60 - minuteDebut + minuteFin;
                heureDEcart = -1;
            }
            else
            {
                minuteDEcart = minuteFin - minuteDebut;
                heureDEcart = 0;
            }
            if (heureFin > heureDebut || (heureFin == heureDebut && heureDEcart == 0))
            {
                heureDEcart += heureFin - heureDebut;
                Console.WriteLine("L'écart entre " + heureDebut + "h" + minuteDebut + " et " + heureFin + "h" + minuteFin + " est de " + heureDEcart + "h" + minuteDEcart);
            }
            else
            {
                Console.WriteLine("Erreur. L'heure de début est après celle de fin.");
            }

            //12
            //int jour;
            //int mois;
            //int annee;
            //Console.WriteLine("jour :");
            //jour = int.Parse(Console.ReadLine());
            //Console.WriteLine("mois :");
            //mois = int.Parse(Console.ReadLine());
            //Console.WriteLine("année :");
            //annee = int.Parse(Console.ReadLine());
            //if(jour==31||(jour==30&&(mois==4||mois==6 || mois ==9 || mois == 11)) || (mois == 2 && (jour == 29 || (jour == 28 && annee % 400 != 0 && (annee % 4 != 0 || annee % 100 == 0)))))
            //{
            //    jour = 1;
            //    if (mois == 12)
            //    {
            //        mois = 1;
            //        annee++;
            //    }
            //    else
            //    {
            //        mois++;
            //    }
            //}
            //else
            //{
            //    jour++;
            //}
            //Console.WriteLine("Demain nous serons le "+jour+"/"+mois+"/"+annee+ ". Nous vous souhaitons une joyeuse saint glinglin.");

            //3.5
            //13
            //double a;
            //double b;
            //double c;
            //Console.WriteLine("saisir la borne ouvrante de l'intervalle :");
            //a = double.Parse(Console.ReadLine());
            //Console.WriteLine("saisir la borne fermante de l'intervalle :");
            //b = double.Parse(Console.ReadLine());
            //if (a > b)
            //{
            //    c = a;
            //    a = b;
            //    b = c;
            //    Console.WriteLine("Vous avez inversé les bornes... Après correction,\nla borne ouvrante est " + a + " et\nla borne fermante est " + b);
            //}
            //Console.WriteLine("L'intervalle est [" + a + ";" + b + "]");

            ////14

            //double x;
            //Console.WriteLine("saisir une valeur x :");
            //x = double.Parse(Console.ReadLine());
            //if (x < a || x > b)
            //{
            //    Console.WriteLine("x n'appartient pas à [a,b]");
            //}
            //else
            //{
            //    Console.WriteLine("x appartient à [a,b]");
            //}

            //15
            double xHautGauche;
            double yHautGauche;
            double xBasDroite;
            double yBasDroite;
            double temp;
            Console.WriteLine("saisir la coordonnée en x du point en haut à gauche :");
            xHautGauche = double.Parse(Console.ReadLine());
            Console.WriteLine("saisir la coordonnée en y du point en haut à gauche :");
            yHautGauche = double.Parse(Console.ReadLine());
            Console.WriteLine("saisir la coordonnée en x du point en bas à droite :");
            xBasDroite = double.Parse(Console.ReadLine());
            Console.WriteLine("saisir la coordonnée en x du point en bas à droite :");
            yBasDroite = double.Parse(Console.ReadLine());
            if (xHautGauche > xBasDroite)
            {
                temp = xHautGauche;
                xHautGauche = xBasDroite;
                xBasDroite = temp;
                Console.WriteLine("Comme vous confondez votre gauche et votre droite, nous avons effectuer la correction suivante:\nla coordonnée en x du point en haut à gauche est " + xHautGauche + "\nla coordonnée en x du point en bas à droite est " + xBasDroite);
            }
            if (yHautGauche < yBasDroite)
            {
                temp = yHautGauche;
                yHautGauche = yBasDroite;
                yBasDroite = temp;
                Console.WriteLine("Comme vous confondez le haut et le bas, nous avons effectuer la correction suivante:\nla coordonnée en y du point en haut à gauche est " + yHautGauche + "\nla coordonnée en y du point en bas à droite est " + yBasDroite);
            }

            //16
            double x;
            double y;
            Console.WriteLine("saisir une coordonnée en x :");
            x = double.Parse(Console.ReadLine());
            Console.WriteLine("saisir une coordonnée en y :");
            y = double.Parse(Console.ReadLine());
            if (x < xHautGauche || x > xBasDroite || y < yBasDroite || y > yHautGauche)
            {
                Console.WriteLine("ce point n'est pas dans le rectangle");
            }
            else
            {
                Console.WriteLine("ce point est dans le rectangle");
            }
        }
    }
}
