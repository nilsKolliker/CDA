using System;

namespace Chaînes_de_caractères
{
    class Program
    {
        static void Main(string[] args)
        {
            //5.1
            //1

            //string chaine;
            //char initial;
            //chaine = "Les framboises sont perchées sur le tabouret de mon grand-père.";
            //while(chaine.Length!=0)
            //{
            //    initial = chaine[0];
            //    chaine=chaine.Remove(0, 1);
            //    Console.WriteLine(initial);
            //}
            //Console.WriteLine(chaine);

            //2

            //string chaine, sousChaine;
            //int i, j;
            //bool estUnIndice;
            //sousChaine = "";
            //Console.WriteLine("saisir la chaine globale");
            //chaine = Console.ReadLine();
            //do
            //{
            //    Console.WriteLine("saisir le 1er indice");
            //    estUnIndice = int.TryParse(Console.ReadLine(), out i);
            //} while (!estUnIndice || i < 0 || i > chaine.Length - 1);
            //do
            //{
            //    Console.WriteLine("saisir le 2eme indice");
            //    estUnIndice = int.TryParse(Console.ReadLine(), out j);
            //} while (!estUnIndice || j < i || j > chaine.Length - 1);
            //for (int k = i; k <= j; k++)
            //{
            //    sousChaine += chaine[k];
            //}
            //Console.WriteLine(sousChaine);

            //3

            //string chaine, sousChaine;
            //int i, j;
            //bool estUnIndice;
            //sousChaine = "";
            //Console.WriteLine("saisir la chaine globale");
            //chaine = Console.ReadLine();
            //do
            //{
            //    Console.WriteLine("saisir le 1er indice");
            //    estUnIndice = int.TryParse(Console.ReadLine(), out i);
            //} while (!estUnIndice || i < 0 || i > chaine.Length - 1);
            //do
            //{
            //    Console.WriteLine("saisir le 2eme indice");
            //    estUnIndice = int.TryParse(Console.ReadLine(), out j);
            //} while (!estUnIndice || j < i || j > chaine.Length - 1);
            //for (int k = i; k <= j; k++)
            //{
            //    sousChaine=sousChaine.Insert(sousChaine.Length, chaine.Substring(k,1));
            //}
            //Console.WriteLine(sousChaine);

            //4

            string chaine;
            char a, b;
            bool estUnChar;
            Console.WriteLine("saisir la chaine");
            chaine = Console.ReadLine();
            do
            {
                Console.WriteLine("saisir le caractere à remplacer");
                estUnChar = char.TryParse(Console.ReadLine(), out a);
            } while (!estUnChar);
            do
            {
                Console.WriteLine("saisir le caractere remplaçant");
                estUnChar = char.TryParse(Console.ReadLine(), out b);
            } while (!estUnChar);
            chaine = chaine.Replace(a, b);
            Console.WriteLine(chaine);

        }
    }
}
