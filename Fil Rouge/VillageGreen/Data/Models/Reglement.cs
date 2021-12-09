using System;
using System.Collections.Generic;

#nullable disable

namespace VillageGreen.Data.Models
{
    public partial class Reglement
    {
        public Reglement()
        {
            Factures = new HashSet<Facture>();
        }

        public int IdReglement { get; set; }
        public string TypePaiement { get; set; }

        public virtual ICollection<Facture> Factures { get; set; }
    }
}
