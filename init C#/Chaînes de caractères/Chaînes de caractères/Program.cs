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

            //string chaine;
            //char a, b;
            //bool estUnChar;
            //Console.WriteLine("saisir la chaine");
            //chaine = Console.ReadLine();
            //do
            //{
            //    Console.WriteLine("saisir le caractere à remplacer");
            //    estUnChar = char.TryParse(Console.ReadLine(), out a);
            //} while (!estUnChar);
            //do
            //{
            //    Console.WriteLine("saisir le caractere remplaçant");
            //    estUnChar = char.TryParse(Console.ReadLine(), out b);
            //} while (!estUnChar);
            //chaine = chaine.Replace(a, b);
            //Console.WriteLine(chaine);

            //5

            //string chaine,newChaine="";
            //char a, b;
            //bool estUnChar;
            //Console.WriteLine("saisir la chaine");
            //chaine = Console.ReadLine();
            //do
            //{
            //    Console.WriteLine("saisir le caractere à remplacer");
            //    estUnChar = char.TryParse(Console.ReadLine(), out a);
            //} while (!estUnChar);
            //do
            //{
            //    Console.WriteLine("saisir le caractere remplaçant");
            //    estUnChar = char.TryParse(Console.ReadLine(), out b);
            //} while (!estUnChar);
            //for (int i = 0; i < chaine.Length; i++)
            //{
            //    newChaine += chaine[i] == a ? b : chaine[i];
            //}
            //Console.WriteLine(newChaine);

            //5.2

            //6
            //string fichier;
            //int indice;
            //do
            //{
            //    Console.WriteLine("saisir le nom du fichier");
            //    fichier = Console.ReadLine();
            //    indice = fichier.LastIndexOf('.');
            //} while (indice==-1||indice+1==fichier.Length);
            //Console.WriteLine("le fichier \"" + fichier.Substring(0, indice) + "\" a pour extension \"" + fichier.Substring(indice + 1) + "\"");//IndexOf

            //7
            //string equation;
            //bool parenthesageCorrecte=true;
            //int premiereOuvrante, premiereFermante;
            //Console.WriteLine("saisir une expression arithmétique totalement parenthésée");
            //equation = Console.ReadLine();
            //premiereOuvrante = equation.IndexOf('(');
            //premiereFermante = equation.IndexOf(')');
            //if (equation.Split('(').Length!= equation.Split(')').Length) parenthesageCorrecte = false;//on vérifie qu'il y a autant de parantheses ouvrantes et fermantes
            //if (equation.LastIndexOf(')') < equation.LastIndexOf('(')) parenthesageCorrecte = false;//on vérifie qu'il n'y a pas de parenthese ouvrante derière la derniere paranthese fermante
            //while (premiereOuvrante != -1 && parenthesageCorrecte)
            //{
            //    if (premiereFermante < premiereOuvrante)//on vérifie qu'il n'y a pas de parenthese fermante devant la premiere parenthese ouvrante
            //    {
            //        parenthesageCorrecte = false;
            //    }
            //    else
            //    {
            //        equation = equation.Substring(premiereOuvrante + 1, premiereFermante - premiereOuvrante - 1) + equation.Substring(premiereFermante + 1);//on retire les premieres parentheses ouvrantes et fermantes
            //    }
            //    premiereOuvrante = equation.IndexOf('(');
            //    premiereFermante = equation.IndexOf(')');
            //}
            //Console.WriteLine(parenthesageCorrecte);

            //7 bis en mieu
            string equation;
            int compteurDeParentheseOuverte = 0;
            bool parenthesageCorrecte = true;
            Console.WriteLine("saisir une expression arithmétique totalement parenthésée");
            equation = Console.ReadLine();
            for (int i = 0; i < equation.Length; i++)
            {
                if (equation[i]=='(')
                {
                    compteurDeParentheseOuverte++;
                }
                else if (equation[i] == ')')
                {
                    compteurDeParentheseOuverte--;
                    parenthesageCorrecte &= compteurDeParentheseOuverte >= 0;
                }
            }
            parenthesageCorrecte &= compteurDeParentheseOuverte == 0;
            Console.WriteLine(parenthesageCorrecte);
        }
    }
}
