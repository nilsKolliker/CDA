using System;
using System.Collections.Generic;

#nullable disable

namespace VillageGreen.Data.Models
{
    public partial class LigneCommande
    {
        public int IdLigneCommande { get; set; }
        public int? IdProduit { get; set; }
        public int? IdCommande { get; set; }
        public int? QuantiteProduit { get; set; }

        public virtual Commande Commande { get; set; }
        public virtual Produit Produit { get; set; }
    }
}
