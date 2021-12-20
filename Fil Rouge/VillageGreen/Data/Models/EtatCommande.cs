using System;
using System.Collections.Generic;

#nullable disable

namespace VillageGreen.Data.Models
{
    public partial class EtatCommande
    {
        public EtatCommande()
        {
            ProgressionsCommande = new HashSet<ProgressionCommande>();
        }

        public int IdEtatCommande { get; set; }
        public string LibelleEtatCommande { get; set; }

        public virtual ICollection<ProgressionCommande> ProgressionsCommande { get; set; }
    }
}
