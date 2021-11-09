using System;
using System.Collections.Generic;

namespace ExerciceClasseEmploye
{
    class Program
    {
        static void Main(string[] args)
        {
            Enfants gosse = new Enfants("Gosse", "1/1/2013"), preAdo = new Enfants("PreAdo", "1/1/2009"), ado = new Enfants("Ado", "1/1/2004"), majeur = new Enfants("Majeur", "1/1/2002");
            List<Enfants> listEnfant1 = new List<Enfants>(), listEnfant2 = new List<Enfants>(), listEnfant3 = new List<Enfants>(), listEnfant4 = new List<Enfants>(),listEnfant5 = new List<Enfants>();
            listEnfant1.Add(gosse);
            listEnfant1.Add(preAdo);
            listEnfant1.Add(ado);
            listEnfant1.Add(majeur);
            listEnfant3.Add(gosse);
            listEnfant4.Add(preAdo);
            listEnfant4.Add(preAdo);
            listEnfant4.Add(preAdo);
            listEnfant4.Add(ado);
            listEnfant4.Add(ado);
            listEnfant5.Add(majeur);

            Agences agenceA = new Agences("A", "ici", "00001", "Ville1", Ressources.restauration.Restaurant_entreprise);
            Agences agenceB = new Agences("B", "là", "00002", "Ville2", Ressources.restauration.Tickets_restaurants);
            List<Employes> listeEmploye = new List<Employes>();
            listeEmploye.Add(new Employes("Lagirafe", "Sophie", "03/04/1961", "Directrice", 40, "Direction", agenceA, listEnfant1));
            listeEmploye.Add(new Employes("Dupond", "Toto", "10/11/2020", "Stagiaire", 1.2, "Entretient", agenceA, listEnfant2));
            listeEmploye.Add(new Employes("Dupond", "Tata", "09/11/2020", "Secretaire", 18, "Direction", agenceA, listEnfant3));
            listeEmploye.Add(new Employes("Thekid", "Billy", "07/11/1859", "Agent de sécurité", 25, "Securité", agenceB, listEnfant4));
            listeEmploye.Add(new Employes("Do", "John", "11/11/1920", "Technicien de surface", 95, "Entretien", agenceB, listEnfant5));
            foreach (Employes employe in listeEmploye)
            {
                employe.DonnerLaPrime();
            }
            Console.WriteLine("Le nombre d'employer est " + listeEmploye.Count+"\n");
            listeEmploye.Sort(Employes.CompareNomPrenom);
            foreach (Employes employe in listeEmploye)
            {
                Console.WriteLine(employe+"\n");
            }
            listeEmploye.Sort(Employes.CompareServiceNomPrenom);
            Console.WriteLine();
            foreach (Employes employe in listeEmploye)
            {
                Console.WriteLine(employe + "\n");
            }
            double masseSalarialeAnnuelle = 0;
            foreach (Employes employe in listeEmploye)
            {
                masseSalarialeAnnuelle += employe.Salaire + employe.CalculPrime();
            }
            Console.WriteLine("Masse Salariale Annuelle: " + masseSalarialeAnnuelle + "\n");
            foreach (Employes employe in listeEmploye)
            {
                Console.WriteLine(employe.Nom + " " + employe.Prenom + ": " + employe.Agence.Restauration);
            }





        }
    }
}
