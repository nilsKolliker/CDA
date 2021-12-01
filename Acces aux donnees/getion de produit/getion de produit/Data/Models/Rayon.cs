using System;
using System.Collections.Generic;

#nullable disable

namespace getion_de_produit.Data.Models
{
    public partial class Rayon
    {
        public Rayon()
        {
            Produits = new HashSet<Produit>();
        }

        public int IdRayon { get; set; }
        public string LibelleRayon { get; set; }

        public virtual ICollection<Produit> Produits { get; set; }
    }
}
