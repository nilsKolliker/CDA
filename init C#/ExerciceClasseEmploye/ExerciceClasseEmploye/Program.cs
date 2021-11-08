using System;
using System.Collections.Generic;

namespace ExerciceClasseEmploye
{
    class Program
    {
        static void Main(string[] args)
        {
            List<Employe> listeEmploye = new List<Employe>();
            listeEmploye.Add(new Employe("Lagirafe", "Sophie", "03/04/1961", "Directrice", 40, "Direction"));
            listeEmploye.Add(new Employe("Dupond", "Toto", "08/11/2013", "Stagiaire", 1.2, "Entretient"));
            listeEmploye.Add(new Employe("Dupond", "Tata", "09/11/1985", "Secretaire", 18, "Direction"));
            listeEmploye.Add(new Employe("Thekid", "Billy", "07/11/1859", "Agent de sécurité", 25, "Securité"));
            listeEmploye.Add(new Employe("Do", "John", "11/11/1920", "Technicien de surface", 95, "Entretien"));
            foreach (var employe in listeEmploye)
            {
                employe.DonnerLaPrime();
            }
            Console.WriteLine("Le nombre d'employer est " + listeEmploye.Count);



        }
    }
}
