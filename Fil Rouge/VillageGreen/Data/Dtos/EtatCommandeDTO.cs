using System;
using System.Collections.Generic;

#nullable disable

namespace VillageGreen.Data.Dtos
{
    public partial class EtatCommandeDTOIn
    {
        public string LibelleEtatCommande { get; set; }
    }

    public partial class EtatCommandeDTOOut
    {
        public int IdEtatCommande { get; set; }
        public string LibelleEtatCommande { get; set; }
    }
}
