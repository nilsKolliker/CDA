using System;
using System.Collections.Generic;

#nullable disable

namespace VillageGreen.Data.Models
{
    public partial class Fournisseur
    {
        public Fournisseur()
        {
            Approvisionnements = new HashSet<Approvisionnement>();
        }

        public int IdFournisseur { get; set; }
        public string NomFournisseur { get; set; }

        public virtual ICollection<Approvisionnement> Approvisionnements { get; set; }
    }
}
