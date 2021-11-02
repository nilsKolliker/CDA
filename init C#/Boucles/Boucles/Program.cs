using System;

namespace Boucles
{
    class Program
    {
        static void Main(string[] args)
        {
            //4.1
            //1 ça affiche 6, 15 (1+2+3+4+5)
            //int a = 1, b = 0, n = 5;
            //while (a <= n)
            //    b += a++;
            //Console.WriteLine(a + " , " + b);

            //2 ça affiche 3 (m), 4 (n), 18 (6*3), 6 (0+1+2+3)
            //int a = 0, b = 0, c = 0, d = 3, m = 3, n = 4;
            //for (a = 0; a < m; a++)//3tours
            //{
            //    d = 0;
            //    for (b = 0; b < n; b++)//4tours
            //        d += b;
            //    c += d;
            //}
            //Console.WriteLine(a + " , " + b + " , " + c + " , " + d + " . ");

            //3
            //int a, b, c, d;
            //a = 1; b = 2;
            //c = a / b;//c=0
            //d = (a == b) ? 3 : 4;//d=4
            //Console.WriteLine(c + " , " + d + " . ");
            //a = ++b;//a=b=3
            //b %= 3;//b=0
            //Console.WriteLine(a + " , " + b + " . ");
            //b = 1;
            //for (a = 0; a <= 10; a++)//11tours
            //    c = ++b;//c=b=12
            //Console.WriteLine(a + " , " + b + " , " + c + " , " + d + " . ");//11,12,12,4

            //4.2
            //4
            //int saisie;
            //Console.WriteLine("saisir un entier positif");
            //saisie = int.Parse(Console.ReadLine());

            //Console.WriteLine();
            ////pour
            //for (int i = 0; i <= saisie; i++)
            //{
            //    Console.WriteLine(saisie - i);
            //}

            //Console.WriteLine();
            ////tant que
            //int j;
            //j = 0;
            //while (j<=saisie)
            //{
            //    Console.WriteLine(saisie - j);
            //    j++;
            //}
            //Console.WriteLine();
            ////jusqu'à
            //int k;
            //k = 0;
            //do
            //{
            //    Console.WriteLine(saisie - k);
            //    k++;
            //} while (k<=saisie);

            //5
            //int saisie;
            //int resultat;
            //Console.WriteLine("saisir un entier positif");
            //saisie = int.Parse(Console.ReadLine());

            //Console.WriteLine();
            //resultat = 1;
            ////pour
            //for (int i = 1; i <= saisie; i++)
            //{
            //    resultat *= i;
            //}
            //Console.WriteLine(resultat);

            //Console.WriteLine();
            ////tant que
            //int j;
            //j = 1;
            //resultat = 1;
            //while (j <= saisie)
            //{
            //    resultat *= j;
            //    j++;
            //}
            //Console.WriteLine(resultat);

            //Console.WriteLine();
            ////jusqu'à
            //int k;
            //k = 1;
            //resultat = 1;
            //do
            //{
            //    resultat *= k;
            //    k++;
            //} while (k <= saisie);
            //Console.WriteLine(resultat);

            //4.3
            //6
            //int saisie;
            //Console.WriteLine("saisir un entier positif");
            //saisie = int.Parse(Console.ReadLine());
            //for (int i = 0; i < 11; i++)
            //{
            //    Console.WriteLine(saisie+" x "+i+" = "+saisie*i);
            //}

            //7
            //Console.Write("   ");
            //for (int i = 0; i < 11; i++)
            //{
            //    if (i<10)
            //    {
            //        Console.Write(" ");
            //    }
            //    Console.Write(i+" ");
            //}
            //for (int i = 0; i < 11; i++)
            //{
            //    Console.Write("\n");
            //    if (i < 10)
            //    {
            //        Console.Write(" ");
            //    }
            //    Console.Write(i+" ");
            //    for (int j = 0; j < 11; j++)
            //    {
            //        if (i * j < 10)
            //        {
            //            Console.Write(" ");
            //        }
            //        Console.Write((i*j) + " ");
            //    }
            //}

            //8
            //int b;
            //int n;
            //int resultat;
            //resultat=1;
            //Console.WriteLine("saisir un entier");
            //b=int.Parse(Console.ReadLine());
            //do
            //{
            //    Console.WriteLine("saisir un entier positif");
            //    n= int.Parse(Console.ReadLine());
            //} while (n<0);
            //for (int i = 0; i < n; i++)
            //{
            //    resultat *= b;
            //}
            //Console.WriteLine(resultat);

            //9
            //int cote;
            //do
            //{
            //    Console.Write("saisir un entier positif : ");
            //    cote = int.Parse(Console.ReadLine());
            //} while (cote < 0);
            //for (int i = 0; i < cote; i++)
            //{
            //    for (int j = 0; j < cote; j++)
            //    {
            //        Console.Write("X");
            //    }
            //    Console.Write("\n");
            //}

            //10
            double a, b;
            string op;
            bool erreur, calculeEnCour;
            calculeEnCour = true;
            do
            {
                Console.WriteLine("1er nombre :");
                erreur = !double.TryParse(Console.ReadLine(), out a);
            } while (erreur);
            do
            {
                do
                {
                    Console.WriteLine("opérateur :");
                    op = Console.ReadLine();
                    switch (op)
                    {
                        case "=":
                            calculeEnCour = false;
                            erreur = false;
                            break;
                        case "+":
                            do
                            {
                                Console.WriteLine("nombre suivant:");//vivement les fonctions !
                                erreur = !double.TryParse(Console.ReadLine(), out b);
                            } while (erreur);
                            a = a + b;
                            break;
                        case "-":
                            do
                            {
                                Console.WriteLine("nombre suivant:");//vivement les fonctions !
                                erreur = !double.TryParse(Console.ReadLine(), out b);
                            } while (erreur);
                            a -= b;
                            break;
                        case "*":
                            do
                            {
                                Console.WriteLine("nombre suivant:");//vivement les fonctions !
                                erreur = !double.TryParse(Console.ReadLine(), out b);
                            } while (erreur);
                            a *= b;
                            break;
                        case "/":
                            do
                            {
                                Console.WriteLine("nombre suivant:");//vivement les fonctions !
                                erreur = !double.TryParse(Console.ReadLine(), out b);
                            } while (erreur || b == 0);
                            a /= b;
                            break;
                        case "$":
                            do
                            {
                                Console.WriteLine("nombre suivant:");//vivement les fonctions !
                                erreur = !double.TryParse(Console.ReadLine(), out b);
                            } while (erreur || b < 0 || b != (int)b);
                            double resultat;
                            resultat = 1;
                            for (int i = 0; i < b; i++)
                            {
                                resultat *= a;
                            }
                            a = resultat;
                            break;
                        case "sqrt":
                            a = Math.Sqrt(a);
                            break;
                        case "!":
                            if (a == (int)a && a >= 0)
                            {
                                int facto;
                                facto = 1;
                                for (int i = 1; i <= a; i++)
                                {
                                    facto *= i;
                                }
                                a = facto;
                            }
                            else
                            {
                                erreur = true;
                            }
                            break;
                        default:
                            erreur = true;
                            break;
                    }
                } while (erreur);
                Console.WriteLine("Le résultat est :\n" + a);
            } while (calculeEnCour);

        }
    }
}
