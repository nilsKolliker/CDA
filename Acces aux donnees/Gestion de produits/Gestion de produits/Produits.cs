using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Gestion_de_produits
{
    public class Produits
    {
        public int Id { get; set; }
        public string Nom { get; set; }
        public string Categorie { get; set; }
        public string Rayon { get; set; }

        public Produits(int id, string nom, string catégorie, string rayon)
        {
            Id = id;
            Nom = nom;
            Categorie = catégorie;
            Rayon = rayon;
        }
        public Produits()
        {
        }
    }
}
