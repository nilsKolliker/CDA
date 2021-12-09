using System;
using System.Collections.Generic;

#nullable disable

namespace VillageGreen.Data.Models
{
    public partial class Ville
    {
        public Ville()
        {
            Adresses = new HashSet<Adresse>();
        }

        public int IdVille { get; set; }
        public string LibelleVille { get; set; }
        public string CodePostal { get; set; }
        public int IdPays { get; set; }

        public virtual Pays Pays { get; set; }
        public virtual ICollection<Adresse> Adresses { get; set; }
    }
}
