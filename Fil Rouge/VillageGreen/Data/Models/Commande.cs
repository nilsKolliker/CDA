using System;
using System.Collections.Generic;

#nullable disable

namespace VillageGreen.Data.Models
{
    public partial class Commande
    {
        public Commande()
        {
            Factures = new HashSet<Facture>();
            LignesCommande = new HashSet<LigneCommande>();
            Livraisons = new HashSet<Livraison>();
            ProgressionsCommande = new HashSet<ProgressionCommande>();
        }

        public int IdCommande { get; set; }
        public string NumeroCommande { get; set; }
        public DateTime? DateCommande { get; set; }
        public int IdUser { get; set; }
        public int IdAdresse { get; set; }

        public virtual Adresse Adresse { get; set; }
        public virtual Client Client { get; set; }
        public virtual ICollection<Facture> Factures { get; set; }
        public virtual ICollection<LigneCommande> LignesCommande { get; set; }
        public virtual ICollection<Livraison> Livraisons { get; set; }
        public virtual ICollection<ProgressionCommande> ProgressionsCommande { get; set; }
    }
}
