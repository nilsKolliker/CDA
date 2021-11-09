using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using static ExerciceClasseEmploye.Program;

namespace ExerciceClasseEmploye
{
    class Agences
    {
        public string Nom { get; set; }
        public string Adresse { get; set; }
        public string CodePostal { get; set; }
        public string Ville { get; set; }
        public Ressources.restauration Restauration { get; set; }

        public Agences(string nom, string adresse, string codePostal, string ville, Ressources.restauration restauration)
        {
            Nom = nom;
            Adresse = adresse;
            CodePostal = codePostal;
            Ville = ville;
            Restauration = restauration;
        }
    }
}
