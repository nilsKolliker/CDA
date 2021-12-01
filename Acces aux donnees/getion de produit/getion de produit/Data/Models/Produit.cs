using System;
using System.Collections.Generic;

#nullable disable

namespace getion_de_produit.Data.Models
{
    public partial class Produit
    {
        public int IdProduit { get; set; }
        public string LibelleProduit { get; set; }
        public int IdCategorie { get; set; }
        public int IdRayon { get; set; }

        public virtual Categorie Categorie { get; set; }
        public virtual Rayon Rayon { get; set; }
    }
}
