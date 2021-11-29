using AutoMapper;
using Microsoft.AspNetCore.JsonPatch;
using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using tableLié.Data.Dtos;
using tableLié.Data.Models;
using tableLié.Data.Services;

namespace tableLié.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class VillesController : ControllerBase
    {

        private readonly VillesServices _service;
        private readonly DepartementsServices _serviceDep;
        private readonly IMapper _mapper;

        public VillesController(VillesServices service, DepartementsServices serviceDep, IMapper mapper)
        {
            _service = service;
            _serviceDep = serviceDep;
            _mapper = mapper;
        }

        //GET api/Villes
        [HttpGet]
        public ActionResult<IEnumerable<VillesDTO>> GetAllVilles()
        {
            IEnumerable<Ville> listeVilles = _service.GetAllVilles();
            return Ok(_mapper.Map<IEnumerable<VillesDTO>>(listeVilles));
        }

        //GET api/Villes/{i}
        [HttpGet("{id}", Name = "GetVilleById")]
        public ActionResult<VillesDTO> GetVilleById(int id)
        {
            Ville commandItem = _service.GetVilleById(id);
            if (commandItem != null)
            {
                return Ok(_mapper.Map<VillesDTO>(commandItem));
            }
            return NotFound();
        }

        //POST api/Villes
        [HttpPost]
        public ActionResult<VillesDTO> CreateVille(VillesDTOin obj)
        {
            _service.AddVille(obj);
            return NoContent();
        }

        //POST api/Villes/{id}
        [HttpPut("{id}")]
        public ActionResult UpdateVille(int id, VillesDTOin obj)
        {
            Ville objFromRepo = _service.GetVilleById(id);
            //Departement depFromRepo = _serviceDep.GetDepartementById(obj.IdDepartement);
            if (objFromRepo == null/*|| depFromRepo==null*/)
            {
                return NotFound();
            }
            _mapper.Map(obj, objFromRepo);
            //objFromRepo.Departement = depFromRepo;
            _service.UpdateVille(objFromRepo);
            return NoContent();
        }

        // Exemple d'appel
        // [{
        // "op":"replace",
        // "path":"",
        // "value":""
        // }]
        //PATCH api/Villes/{id}
        [HttpPatch("{id}")]
        public ActionResult PartialVilleUpdate(int id, JsonPatchDocument<Ville> patchDoc)
        {
            Ville objFromRepo = _service.GetVilleById(id);
            if (objFromRepo == null)
            {
                return NotFound();
            }
            Ville objToPatch = _mapper.Map<Ville>(objFromRepo);
            patchDoc.ApplyTo(objToPatch, ModelState);
            if (!TryValidateModel(objToPatch))
            {
                return ValidationProblem(ModelState);
            }
            _mapper.Map(objToPatch, objFromRepo);
            _service.UpdateVille(objFromRepo);
            return NoContent();
        }

        //DELETE api/Villes/{id}
        [HttpDelete("{id}")]
        public ActionResult DeleteVille(int id)
        {
            Ville obj = _service.GetVilleById(id);
            if (obj == null)
            {
                return NotFound();
            }
            _service.DeleteVille(obj);
            return NoContent();
        }


    }
}
