using AutoMapper;
using Microsoft.AspNetCore.Mvc;
using PersonneAnimal.Data.Dtos;
using PersonneAnimal.Data.Models;
using PersonneAnimal.Data.Services;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace PersonneAnimal.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class AdoptionsController : ControllerBase
    {

        private readonly AdoptionsServices _service;
        private readonly IMapper _mapper;

        public AdoptionsController(AdoptionsServices service, IMapper mapper)
        {
            _service = service;
            _mapper = mapper;
        }

        //GET api/Adoptions
        [HttpGet]
        public ActionResult<IEnumerable<AdoptionDTOout>> GetAllAdoptions()
        {
            IEnumerable<Adoption> listeAdoptions = _service.GetAllAdoptions();
            return Ok(_mapper.Map<IEnumerable<AdoptionDTOout>>(listeAdoptions));
        }

        //GET api/Adoptions/{i}
        [HttpGet("{id}", Name = "GetAdoptionById")]
        public ActionResult<AdoptionDTOout> GetAdoptionById(int id)
        {
            Adoption commandItem = _service.GetAdoptionById(id);
            if (commandItem != null)
            {
                return Ok(_mapper.Map<AdoptionDTOout>(commandItem));
            }
            return NotFound();
        }

        //POST api/Adoptions
        [HttpPost]
        public ActionResult<AdoptionDTOout> CreateAdoption(AnimalDTOin obj)
        {
            Adoption adoption = _mapper.Map<Adoption>(obj);
            _service.AddAdoption(adoption);
            return CreatedAtRoute(nameof(GetAdoptionById), new { Id = adoption.IdAdoption }, adoption);
        }

        //POST api/Adoptions/{id}
        [HttpPut("{id}")]
        public ActionResult UpdateAdoption(int id, AnimalDTOin obj)
        {
            Adoption objFromRepo = _service.GetAdoptionById(id);
            if (objFromRepo == null)
            {
                return NotFound();
            }
            _mapper.Map(obj, objFromRepo);
            _service.UpdateAdoption(objFromRepo);
            return NoContent();
        }

        // Exemple d'appel
        // [{
        // "op":"replace",
        // "path":"",
        // "value":""
        // }]
        //PATCH api/Adoptions/{id}
        //[HttpPatch("{id}")]
        //public ActionResult PartialAdoptionUpdate(int id, JsonPatchDocument<Adoption> patchDoc)
        //{
        //    Adoption objFromRepo = _service.GetAdoptionById(id);
        //    if (objFromRepo == null)
        //    {
        //        return NotFound();
        //    }
        //    Adoption objToPatch = _mapper.Map<Adoption>(objFromRepo);
        //    patchDoc.ApplyTo(objToPatch, ModelState);
        //    if (!TryValidateModel(objToPatch))
        //    {
        //        return ValidationProblem(ModelState);
        //    }
        //    _mapper.Map(objToPatch, objFromRepo);
        //    _service.UpdateAdoption(objFromRepo);
        //    return NoContent();
        //}

        //DELETE api/Adoptions/{id}
        [HttpDelete("{id}")]
        public ActionResult DeleteAdoption(int id)
        {
            Adoption obj = _service.GetAdoptionById(id);
            if (obj == null)
            {
                return NotFound();
            }
            _service.DeleteAdoption(obj);
            return NoContent();
        }


    }
}
