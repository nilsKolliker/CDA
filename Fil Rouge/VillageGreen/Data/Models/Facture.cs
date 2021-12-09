using System;
using System.Collections.Generic;

#nullable disable

namespace VillageGreen.Data.Models
{
    public partial class Facture
    {
        public int IdFacture { get; set; }
        public int? IdReglement { get; set; }
        public int? IdCommande { get; set; }
        public DateTime DatePaiement { get; set; }
        public decimal MontantPaiement { get; set; }

        public virtual Commande Commande { get; set; }
        public virtual Reglement IdReglementNavigation { get; set; }
    }
}
