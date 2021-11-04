using System;

namespace Tableaux
{
    class Program
    {
        static void Main(string[] args)
        {
            //6.1

            //1
            //char[] c = new char[4];//[a,R,k,J]
            //c[0] = 'a';
            //c[3] = 'J';
            //c[2] = 'k';
            //c[1] = 'R';
            //for (int k = 0; k < 4; k++)
            //    Console.WriteLine(c[k]);
            //for (int k = 0; k < 4; k++)
            //    c[k]++;//char suivant en ascii
            //foreach (char i in c)
            //    Console.WriteLine(i);

            //2
            //int[] k;
            //k = new int[10];//tableau d'entier de 10 cases
            //k[0] = 1;
            //for (int i = 1; i < 10; i++)//[1,0,0,0,0,0,0,0,0,0]
            //    k[i] = 0;
            //for (int j = 1; j <= 3; j++)//tourne 3 fois
            //    for (int i = 1; i < 10; i++)//[1,1,1,1,1,1,1,1,1,1] [1,2,3,4,5,6,7,8,9,10] [1,3,6,10,15,21,28,36,45,55] //suite des nombres triangulaires
            //        k[i] += k[i - 1];
            //foreach (int i in k)
            //    Console.WriteLine(i);

            //3
            //int[] k;
            //k = new int[10];
            //k[0] = 1;
            //k[1] = 1;
            //for (int i = 2; i < 10; i++)//[1,1,0,0,0,0,0,0,0,0]
            //    k[i] = 0;
            //for (int j = 1; j <= 3; j++)
            //    for (int i = 1; i < 10; i++)//[1,2,2,2,2,2,2,2,2,2] [1,3,5,7,9,11,13,15,17,19] [1,4,9,16,25,36,49,64,81,100] //suite des nombres carrés
            //        k[i] += k[i - 1];
            //foreach (int p in k)
            //    Console.WriteLine(p);

            //4
            //int[] T = new int[10] {1,2,3,4,5,6,7,8,9,10};
            //foreach (int p in T)
            //    Console.WriteLine(p);

            //5
            int[] T = new int[10];
            for (int i = 0; i < T.Length; i++)
                T[i] = i + 1;
            foreach (int p in T)
                Console.WriteLine(p);
            Console.WriteLine();

            //6
            int somme = 0;
            for (int i = 0; i < T.Length; i++)
                somme += T[i];
            Console.WriteLine(somme);
            Console.WriteLine();

            //7
            int valUtilisayeur;
            bool estUnInt;
            do
            {
                Console.WriteLine("saisir un int");
                estUnInt = int.TryParse(Console.ReadLine(), out valUtilisayeur);
            } while (!estUnInt);
            if (Array.IndexOf(T, valUtilisayeur) == -1)
                Console.WriteLine("Ce int n'est pas dans le tableau");
            else
                Console.WriteLine("Ce int est dans le tableau");
            Console.WriteLine();

            //8
            int[] tableauCirculezYaRienAVoir = new int[10];
            for (int i = 0; i < T.Length; i++)
                tableauCirculezYaRienAVoir[(i + 1) % T.Length] = T[i];
            foreach (int p in tableauCirculezYaRienAVoir)
                Console.WriteLine(p);
            Console.WriteLine();
            //9
            int temp = T[T.Length - 1];
            for (int i = T.Length - 1; i > 0; i--)
                T[i] = T[i - 1];
            T[0] = temp;
            foreach (int p in T)
                Console.WriteLine(p);
            Console.WriteLine();
            //10
            for (int i = 0; i < T.Length / 2; i++)
            {
                temp = T[i];
                T[i] = T[T.Length - 1 - i];
                T[T.Length - 1 - i] = temp;
            }
            foreach (int p in T)
                Console.WriteLine(p);
            Console.WriteLine();



            ////11
            //int[] T = new int[20];
            //for (int i = 0; i < T.Length; i++)
            //    T[i] = (i * i) % 17;
            //foreach (int p in T)
            //    Console.WriteLine(p);
            //Console.WriteLine();

            ////12
            //int petit = T[0], gros = T[0];
            //for (int i = 1; i < T.Length; i++)
            //{
            //    if (T[i] < petit) petit = T[i];
            //    if (T[i] > gros) gros = T[i];
            //}
            //Console.WriteLine(petit);
            //Console.WriteLine(gros);
            //Console.WriteLine();

            ////13
            //int valUtilisayeur;
            //bool estUnInt;
            //do
            //{
            //    Console.WriteLine("saisir un INT");
            //    estUnInt = int.TryParse(Console.ReadLine(), out valUtilisayeur);
            //} while (!estUnInt);
            //for (int i = 0; i < T.Length; i++)
            //{
            //    if (T[i] == valUtilisayeur) Console.WriteLine(i);
            //}

            ////14
            //int nombreDOccurence = 0;
            //int[] tableauDOccurence = new int[T.Length];//dans le doute, il est au max
            //do
            //{
            //    Console.WriteLine("saisir un INT");
            //    estUnInt = int.TryParse(Console.ReadLine(), out valUtilisayeur);
            //} while (!estUnInt);
            //for (int i = 0; i < T.Length; i++)
            //    if (T[i] == valUtilisayeur) tableauDOccurence[nombreDOccurence++] = i;
            //Array.Resize(ref tableauDOccurence, nombreDOccurence);//réduction du tableau
            //if (nombreDOccurence == 0) Console.WriteLine("La valeur " + valUtilisayeur + " n’a pas été trouvée");
            //else
            //{
            //    Console.Write("La valeur " + valUtilisayeur + " se trouve aux indices suivants:");
            //    foreach (int p in tableauDOccurence)
            //        Console.Write(" "+p);
            //}

            //15
            //double[] tabVal = new double[6] { 0.5, 0.2, 0.1, 0.05, 0.02, 0.01 };
            //int[] tabNbrPiece = new int[6];
            //double somme;
            //bool cEstEntreZeroEtUn;
            //do
            //{
            //    Console.WriteLine("saisir un nombre entre 0 et 0.99");
            //    cEstEntreZeroEtUn = double.TryParse(Console.ReadLine(), out somme) && somme <= 0.99 && somme >= 0 && somme * 100 % 1 == 0;
            //} while (!cEstEntreZeroEtUn);
            //for (int i = 0; i < tabVal.Length; i++)
            //{
            //    while (Math.Round(somme,2) >= tabVal[i])
            //    //while (somme >= tabVal[i])
            //        {
            //        somme -= tabVal[i];
            //        tabNbrPiece[i]++;
            //    }
            //}
            //foreach (int p in tabNbrPiece)
            //    Console.Write(" "+p);
            //Console.WriteLine();
            ////Console.WriteLine(somme);

            ////16
            //int[] T = new int[20];
            //Random dice = new Random();
            //for (int i = 0; i < T.Length; i++)
            //{
            //    T[i]=
            //}
        }
    }
}
