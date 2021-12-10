using System;
using System.Collections.Generic;

#nullable disable

namespace VillageGreen.Data.Dtos
{
    public partial class CategorieClientDTOIn
    {
        public string LibelleCategClient { get; set; }
        public string InfoReglement { get; set; }
        public int CoefCategClient { get; set; }
    }
    public partial class CategorieClientDTOOut
    {
        public int IdCategorieClient { get; set; }
        public string LibelleCategClient { get; set; }
        public string InfoReglement { get; set; }
        public int CoefCategClient { get; set; }
    }
}
