using System;
using System.Collections.Generic;

#nullable disable

namespace VillageGreen.Data.Models
{
    public partial class TVA
    {
        public TVA()
        {
            HistoriqueTVA = new HashSet<HistoriqueTVA>();
        }

        public int IdTva { get; set; }
        public int? TauxTva { get; set; }

        public virtual ICollection<HistoriqueTVA> HistoriqueTVA { get; set; }
    }
}
