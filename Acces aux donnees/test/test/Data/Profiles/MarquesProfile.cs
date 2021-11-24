using AutoMapper;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using test.Data.Dtos;
using test.Data.Models;

namespace test.Data.Profiles
{
    public class MarquesProfile : Profile
    {
        public MarquesProfile ()
        {
            CreateMap<Marque,MarquesDto>();
            CreateMap<MarquesDto, Marque>();
        }
    }
}
