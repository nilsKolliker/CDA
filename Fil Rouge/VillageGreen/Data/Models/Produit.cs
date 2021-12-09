using System;
using System.Collections.Generic;

#nullable disable

namespace VillageGreen.Data.Models
{
    public partial class Produit
    {
        public Produit()
        {
            Approvisionnements = new HashSet<Approvisionnement>();
            HistoriqueTVA = new HashSet<HistoriqueTVA>();
            LignesCommande = new HashSet<LigneCommande>();
        }

        public int IdProduit { get; set; }
        public string LibelleProduit { get; set; }
        public string Description { get; set; }
        public string RefProduit { get; set; }
        public decimal PrixHorsTaxe { get; set; }
        public string Photo { get; set; }
        public int Stock { get; set; }
        public int IdRubrique { get; set; }

        public virtual Rubrique Rubrique { get; set; }
        public virtual ICollection<Approvisionnement> Approvisionnements { get; set; }
        public virtual ICollection<HistoriqueTVA> HistoriqueTVA { get; set; }
        public virtual ICollection<LigneCommande> LignesCommande { get; set; }
    }
}
